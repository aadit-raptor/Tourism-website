document.addEventListener('DOMContentLoaded', function() {
    const destinationList = document.getElementById('destination-list');

    const destinations = [
        { name: 'Paris', country: 'France' },
        { name: 'Tokyo', country: 'Japan' },
        { name: 'New York', country: 'USA' }
    ];
    function displayDestinations() {
        destinationList.innerHTML = '';
        destinations.forEach(destination => {
            const destinationDiv = document.createElement('div');
            destinationDiv.classList.add('destination');
            destinationDiv.textContent = `${destination.name}, ${destination.country}`;
            destinationList.appendChild(destinationDiv);
        });
    }

    }

    displayDestinations();

    destinationList.addEventListener('click', function(event) {
        if (event.target.classList.contains('destination')) {
            const destinationName = event.target.textContent.split(',')[0];
            fetchWeather(destinationName);
        }
    });
});
