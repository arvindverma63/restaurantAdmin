<!-- Modal -->
<div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">Select Payment Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <select class="form-select" aria-label="Default select example" id="type">
                    <option selected disabled>Select Payment Type</option>
                    <option value="cash">Cash</option>
                    <option value="online">Online</option>
                    <option value="card">Card</option>
                    <option value="split">Split</option>
                </select>
                <div id="split-container" style="margin-top: 10px; display: none;">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button">Online</button>
                        </div>
                        <input type="text" class="form-control" placeholder="Type Percentage" aria-label="Online Percentage"
                            id="online-split">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button">Cash</button>
                        </div>
                        <input type="text" class="form-control" placeholder="Type Percentage" aria-label="Cash Percentage"
                            id="cash-split">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button">Due</button>
                        </div>
                        <input type="text" class="form-control" placeholder="Type Percentage" aria-label="Due Percentage"
                            id="due-split">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary text-white" id="make-payment">Pay</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle the visibility of the split-container
    document.getElementById('type').addEventListener('change', function() {
        const splitContainer = document.getElementById('split-container');
        if (this.value === 'split') {
            splitContainer.style.display = 'block';
        } else {
            splitContainer.style.display = 'none';
        }
    });
</script>
