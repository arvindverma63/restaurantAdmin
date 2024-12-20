<!-- Modal -->
<!-- Toast Container -->
<div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 105005;">
    <div id="toastMessage" class="toast align-items-center text-white bg-success border-0" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Invoice sent successfully!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>

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
                <button type="button" id="mail-invoice" class="btn btn-danger text-white">
                    <span id="spinner" class="spinner-border spinner-border-sm me-2 d-none" role="status"
                        aria-hidden="true"></span>
                    Mail Invoice
                </button>
            </div>

        </div>
    </div>
</div>
<script>
    document.getElementById('mail-invoice').addEventListener('click', async function() {
        const invoiceHtml = document.getElementById('invoice-body').innerHTML;
        const customerMail = document.getElementById('customer-email').value;
        const mailButton = document.getElementById('mail-invoice');
        const spinner = document.getElementById('spinner');

        if (!customerMail) {
            alert('Please enter a valid customer email.');
            return;
        }

        // Show spinner and disable button
        spinner.classList.remove('d-none');
        mailButton.setAttribute('disabled', 'true');

        try {
            // Step 1: Fetch Auth Data
            const authResponse = await fetch('/getAuth');
            if (!authResponse.ok) throw new Error('Failed to fetch authentication details.');

            const authData = await authResponse.json();
            const token = authData.token;
            const apiBaseUrl = authData.app_url;

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
                // Show success toast
                const toast = new bootstrap.Toast(document.getElementById('toastMessage'));
                toast.show();
            } else {
                throw new Error(responseData.message || 'Failed to send invoice.');
            }
        } catch (error) {
            console.error('Error:', error.message);
            alert(`Error: ${error.message}`); // You can also create a toast for errors
        } finally {
            // Hide spinner and re-enable button
            spinner.classList.add('d-none');
            mailButton.removeAttribute('disabled');
        }
    });
</script>
