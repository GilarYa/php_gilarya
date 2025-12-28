const searchInput = document.getElementById('searchInput');
const tableBody = document.getElementById('tableBody');
let timeout;

searchInput.addEventListener('keyup', function() {
    clearTimeout(timeout);
    
    timeout = setTimeout(() => {
        const query = this.value;
        
        fetch('search.php?q=' + encodeURIComponent(query))
            .then(response => response.text())
            .then(data => {
                tableBody.innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }, 300);
});
