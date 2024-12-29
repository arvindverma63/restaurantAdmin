document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll(".first-item-time").forEach(element => {
        const tableNumber = element.getAttribute('data-table-number');
        if (tableNumber) {
            fetch('/getData/' + tableNumber)
                .then(response => response.json())
                .then(data => {
                    // console.log(data);
                    if (data && data.data) {
                        if (data.data.items && data.data.items.length > 0) {
                            const time = data.data.items[0].created_at;
                            if (time) {
                                console.log(time);
                                element.setAttribute("data-time", time);
                                element.classList.remove("hide");
                            }
                        }
                    }


                })
                .catch(error => {
                    // console.error('Error fetching cart data:', error);
                });
        }
    });
});
