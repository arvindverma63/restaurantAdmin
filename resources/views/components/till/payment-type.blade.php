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
                        <input type="number" class="form-control" placeholder="Type Percentage" id="online-split"
                            value="0" min="0" max="100">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button">Cash</button>
                        </div>
                        <input type="number" class="form-control" placeholder="Type Percentage" id="cash-split"
                            value="100" min="0" max="100">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button">Due</button>
                        </div>
                        <input type="number" class="form-control" placeholder="Type Percentage" id="due-split"
                            value="0" min="0" max="100">
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
    // Handle split-container visibility
    document.getElementById('type').addEventListener('change', function() {
        const splitContainer = document.getElementById('split-container');
        if (this.value === 'split') {
            splitContainer.style.display = 'block';
        } else {
            splitContainer.style.display = 'none';
        }
    });

    // Input elements for split
    const onlineInput = document.getElementById('online-split');
    const cashInput = document.getElementById('cash-split');
    const dueInput = document.getElementById('due-split');

    // Function to calculate the remaining percentage
    function updateSplitValues(changedInput, otherInput1, otherInput2) {
        const total = 100;
        const changedValue = parseInt(changedInput.value) || 0;

        // Calculate the remaining percentage
        const remaining = total - changedValue;
        const halfRemaining = Math.max(0, Math.floor(remaining / 2));

        // Update other inputs
        otherInput1.value = halfRemaining;
        otherInput2.value = remaining - halfRemaining;
    }

    // Event listeners for changes
    onlineInput.addEventListener('input', function() {
        updateSplitValues(onlineInput, cashInput, dueInput);
    });

    cashInput.addEventListener('input', function() {
        updateSplitValues(cashInput, onlineInput, dueInput);
    });

    dueInput.addEventListener('input', function() {
        updateSplitValues(dueInput, onlineInput, cashInput);
    });
</script>
