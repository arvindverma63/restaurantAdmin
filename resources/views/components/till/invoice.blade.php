<!-- Modal -->
<div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="invoiceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="invoiceModalLabel">Invoice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="invoice-body">


            </div>
            <div class="modal-footer">
                <button type="button" id="mail-invoice" class="btn btn-danger text-white">Mail Invoice</button>
            </div>

        </div>
    </div>
</div>
<script>
    document.getElementById('mail-invoice').addEventListener('click', function() {
        const invoiceHtml = document.getElementById('invoice-body').innerHTML;

        let token;
        let apiBaseUrl;

        fetch('/getAuth')
        .then(response=>response.json())
        .then(data=>{
            token = data.token;
            apiBaseUrl = data.app_url;
        })

        fetch(apiBaseUrl+'/send-invoice-email', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer'+token,
                },
                body: JSON.stringify({
                    htmlContent: invoiceHtml,
                    email: 'customer@example.com'
                }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Invoice sent successfully!');
                } else {
                    alert('Failed to send invoice.');
                }
            })
            .catch(error => console.error('Error:', error));

    })
</script>
