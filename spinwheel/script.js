const wheel = document.getElementById("wheel");
const spinButton = document.getElementById("spin");
let container = document.querySelector(".container");
let isSpinning = false;
let dataLength;
let slicesData = [];
let currentTotalRotation = 0;
let logicalRotation = 0;
let visualRotation = 0;

let selectedPrize = '';
document.querySelectorAll('.prize-button').forEach(button => {
    button.addEventListener('click', function () {
        selectedPrize = button.getAttribute('data-prize');
        console.log("Prize selected: ", selectedPrize);
        this.classList.toggle('button-clicked');

        // this.parentElement.style.display = 'none';
        Swal.fire({
            html: `<p style="font-size: 30px; font-weight: 800;">Spin now to know who wins </br> <strong style="color: blue;">${selectedPrize}</strong></p>`,
            confirmButtonText: 'OK'
        })
    });
});

spinButton.addEventListener('click', function () {
    if (!selectedPrize) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Please choose a prize before spinning!",
        });
        return;
    }
    if (!isSpinning && slicesData.length && selectedPrize) {
        isSpinning = true;

        const randomRotation = Math.floor(Math.random() * 360);
        logicalRotation = (logicalRotation + randomRotation) % 360;
        visualRotation += 360 * 100 + randomRotation;

        container.style.transform = `rotate(${visualRotation}deg)`;
        container.offsetWidth;
        container.style.transition = "transform 2s ease-in-out";
        container.addEventListener('transitionend', function determineResult() {
            isSpinning = false;

            const finalDegree = logicalRotation % 360;
            const adjustedDegree = (360 - finalDegree) % 360;
            const resultSliceIndex = Math.floor(adjustedDegree / (360 / slicesData.length));

            console.log(`The wheel stopped on slice index: ${resultSliceIndex}`);
            console.log(`The wheel stopped on the name: ${slicesData[resultSliceIndex]}`);

            setTimeout(() => {
                Swal.fire({
                    title: `<strong>Congratulations!</strong>`,
                    html: `<div style="font-size: 2rem"><strong>You've won</strong></div> <div style="font-size: 3rem"><strong>${selectedPrize}</strong>!</div><br/><div style="font-size: 5rem; color: black;"><strong>${slicesData[resultSliceIndex]}</strong></div>`,
                    confirmButtonText: 'OK',
                    showCancelButton: true,
                    cancelButtonText: 'Cancel',
                  
                }).then((result) => {
                    if (result.isConfirmed) {
                      
                        console.log("Selected prize: ", selectedPrize);

                        fetch('update_winner.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded',
                            },
                            body: `winner=${encodeURIComponent(slicesData[resultSliceIndex])}&prize=${encodeURIComponent(selectedPrize)}`
                        })
                            .then(response => response.text())
                            .then(data => {
                                console.log("Server response: ", data);
                                location.reload();
                            })
                            .catch(error => {
                                console.error('Error updating the winner:', error);
                            });
                    } else if (result.isDismissed) {
                        // User clicked Cancel
                        console.log('Spin canceled by user.');
                        location.reload();
                    }
                });

                container.removeEventListener('transitionend', determineResult);
            });
        });
    }
});


function reloadSpinWheel() {

    fetch('connection.php')
        .then(response => response.json())
        .then(data => {
            console.log("Number of Slices: " + data.length);
            slicesData = data;

            container.innerHTML = '';

            const angleIncrement = 360 / data.length;

            data.forEach((name, index) => {
                const slice = document.createElement('div');
                slice.className = 'slice' + (index % 2 === 0 ? "blue" : "yellow");

                const rotationAngle = angleIncrement * index;
                slice.style.transform = `rotate(${rotationAngle}deg)`;
                container.appendChild(slice);

                const textContainer = document.createElement('div');
                textContainer.className = 'text-container';
                textContainer.textContent = name;

                slice.appendChild(textContainer);
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
        
}

document.addEventListener('DOMContentLoaded', reloadSpinWheel);

function downloadWinnersList() {
    // Fetch the winners list from the server
    fetch('winner.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `winner=${encodeURIComponent(slicesData[resultSliceIndex])}&prize=${encodeURIComponent(selectedPrize)}`
    })
        .then(response => response.json())
        .then(data => {
            if (data.data) {
              
                const winnersString = JSON.stringify(data.data, null, 2);

                const blob = new Blob([winnersString], { type: 'application/json' });

                const downloadLink = document.createElement('a');
                downloadLink.href = URL.createObjectURL(blob);
                downloadLink.download = 'winners_list.json';

                document.body.appendChild(downloadLink);

                downloadLink.click();

                document.body.removeChild(downloadLink);
            } else {
                console.error('Error fetching winners data:', data.success);
            }
        })
        .catch(error => {
            console.error('Error fetching winners data:', error);
        });
}




