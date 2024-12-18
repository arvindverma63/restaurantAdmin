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
    document.getElementById('mail-invoice').addEventListener('click', async function () {
    const invoiceHtml = document.getElementById('invoice-body').innerHTML;
    const customerMail = document.getElementById('customer-email').value;

    if (!customerMail) {
        alert('Please enter a valid customer email.');
        return;
    }

    try {
        // Step 1: Fetch Auth Data
        const authResponse = await fetch('/getAuth');
        if (!authResponse.ok) throw new Error('Failed to fetch authentication details.');

        const authData = await authResponse.json();
        const token = authData.token;
        const apiBaseUrl = authData.app_url;
        console.log(authData);

        // Step 2: Send Email Request
        const emailResponse = await fetch(`${apiBaseUrl}/send-invoice-email`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`,
            },
            body: JSON.stringify({
                htmlContent: invoiceHtml,
                email: customerMail,
            }),
        });

        const responseData = await emailResponse.json();

        if (responseData.success) {
            alert('Invoice sent successfully!');
        } else {
            throw new Error(responseData.message || 'Failed to send invoice.');
        }
    } catch (error) {
        console.error('Error:', error.message);
        alert(`Error: ${error.message}`);
    }
});

</script>
