@if (empty($menuItems['data']['menus']))
    <p class="text-center">No menu items available.</p>
@else
    <!-- Table structure for DataTable -->
    <table id="menuTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($menuItems['data']['menus'] as $menuItem)
                <tr>
                    <td>
                        <img src="{{ $menuItem['itemImage'] }}" alt="{{ $menuItem['itemName'] }}"
                            style="width: 50px; height: auto;">
                    </td>
                    <td>{{ $menuItem['itemName'] }}</td>
                    <td>₹{{ $menuItem['price'] }}</td>
                    <td>{{ \Carbon\Carbon::parse($menuItem['created_at'])->format('d-m-Y H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($menuItem['updated_at'])->format('d-m-Y H:i') }}</td>
                    <td>
                        <!-- Edit Menu Button -->
                        <a href="#" class="btn btn-sm btn-primary text-white" data-bs-toggle="modal"
                            data-bs-target="#editMenuModal{{ $menuItem['id'] }}">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <!-- Delete Menu Form -->
                        <form action="{{ url('/menu/' . $menuItem['id']) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger text-white"
                                onclick="return confirm('Are you sure you want to delete this menu item?');">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>
                        </form>
                        <!-- Edit Stock Button -->
                        <a href="#" class="btn btn-sm btn-warning text-white" data-bs-toggle="modal"
                            data-bs-target="#editStockModal{{ $menuItem['id'] }}">
                            <i class="fas fa-box"></i> Edit Stock
                        </a>
                    </td>
                </tr>

                <!-- Edit Menu Modal -->
                <div class="modal fade" id="editMenuModal{{ $menuItem['id'] }}" tabindex="-1"
                    aria-labelledby="editMenuLabel{{ $menuItem['id'] }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editMenuLabel{{ $menuItem['id'] }}">Edit Menu Item:
                                    {{ $menuItem['itemName'] }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <input type="hidden" value="{{ $menuItem['id'] }}" id="itemId">
                                    <input type="hidden" value="{{ Session::get('token') }}" id="token">
                                    <input type="hidden" value="{{ env('API_BASE_URL') }}" id="baseUrl">

                                    <div class="mb-3">
                                        <label for="itemName" class="form-label">Item Name</label>
                                        <input type="text" class="form-control" id="edititemName" name="itemName"
                                            value="{{ $menuItem['itemName'] }}" required>
                                    </div>

                                    <!-- Category Dropdown -->
                                    <div class="mb-3">
                                        <label for="categoryId" class="form-label">Category</label>
                                        <select class="form-select" id="categorySelect{{ $menuItem['id'] }}"
                                            name="categoryId" required>
                                            <option value="">Select Category</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="price" class="form-label">Price</label>
                                        <input type="number" step="0.01" class="form-control" id="editprice"
                                            name="price" value="{{ $menuItem['price'] }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="itemImage" class="form-label">Item Image</label>
                                        <input type="file" class="form-control" id="edititemImage" name="itemImage"
                                            accept="image/jpeg, image/png, image/jpg, image/gif">
                                        @if ($menuItem['itemImage'])
                                            <div class="mt-2">
                                                <img src="{{ $menuItem['itemImage'] }}" alt="Current Image"
                                                    style="width: 100px; height: auto;">
                                                <p class="text-muted">Current image</p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" id="editsubmit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>

                            <script>
                                document.getElementById('editsubmit').addEventListener('click', function(event) {
                                    event.preventDefault(); // Prevent default form submission

                                    // Dynamic ID handling
                                    var itemId = document.getElementById('itemId').value;
                                    var categoryId = document.querySelector(`#categorySelect${itemId}`)
                                    .value; // Dynamically select dropdown

                                    // Collect other input values
                                    var itemName = document.getElementById('edititemName').value;
                                    var price = document.getElementById('editprice').value;
                                    var itemImage = document.getElementById('edititemImage').files[0];
                                    var token = document.getElementById('token').value;
                                    var baseUrl = document.getElementById('baseUrl').value;

                                    // Ensure categoryId is valid
                                    if (!categoryId) {
                                        alert('Please select a category.');
                                        categoryId = null;
                                    }

                                    // Create FormData object
                                    var formData = new FormData();
                                    formData.append('itemName', itemName);
                                    formData.append('price', price);
                                    formData.append('categoryId', categoryId);
                                    if (itemImage) {
                                        formData.append('itemImage', itemImage);
                                    }

                                    // Send PUT request using Fetch API
                                    fetch(`${baseUrl}/menu/${itemId}`, {
                                            method: 'PUT',
                                            body: formData,
                                            headers: {
                                                'Authorization': `Bearer ${token}`, // Add space after 'Bearer'
                                            },
                                        })
                                        .then(response => {
                                            if (!response.ok) {
                                                throw new Error('Network response was not ok');
                                            }
                                            return response.json();
                                        })
                                        .then(data => {
                                            console.log('Success:', data);
                                            alert('Menu item updated successfully!');
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                            alert('Failed to update menu item.');
                                        });
                                });
                            </script>

                            <!-- Edit Stock Modal -->
                            <div class="modal fade" id="editStockModal{{ $menuItem['id'] }}" tabindex="-1"
                                aria-labelledby="editStockLabel{{ $menuItem['id'] }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editStockLabel{{ $menuItem['id'] }}">Edit
                                                Stock for: {{ $menuItem['itemName'] }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form id="editStockForm{{ $menuItem['id'] }}"
                                            action="{{ url('updateMenuStock/' . $menuItem['id']) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label">Stock Items</label>
                                                    <div id="stockItemsContainer{{ $menuItem['id'] }}">
                                                        <!-- Existing stock items from database -->
                                                        @foreach ($menuItem['stockItems'] as $index => $stockItem)
                                                            <div class="row g-2 mb-2 stock-item-row">
                                                                <div class="col">
                                                                    <select class="form-select"
                                                                        name="stockItems[{{ $index }}][stockId]"
                                                                        required>
                                                                        <option value="" disabled>Select Stock
                                                                            Item</option>
                                                                        @foreach ($menuItems['data']['inventoryOptions'] as $inventoryItem)
                                                                            <option value="{{ $inventoryItem['id'] }}"
                                                                                {{ $stockItem['stockId'] == $inventoryItem['id'] ? 'selected' : '' }}>
                                                                                {{ $inventoryItem['itemName'] }}
                                                                            </option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="col">
                                                                    <input type="number" step="0.001"
                                                                        class="form-control"
                                                                        name="stockItems[{{ $index }}][quantity]"
                                                                        value="{{ $stockItem['quantity'] }}"
                                                                        placeholder="Quantity" required>
                                                                </div>
                                                                <div class="col-auto">
                                                                    <button type="button"
                                                                        class="btn btn-danger btn-sm remove-stock-item"
                                                                        onclick="removeStockItemRow(this)">&times;</button>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        onclick="addStockItemRow({{ $menuItem['id'] }})">Add Stock
                                                        Item</button>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Save Stock</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
            @endforeach
        </tbody>
    </table>
@endif
<!-- Template for Dynamic Stock Row - Place Outside of the Conditional Statements -->
<template id="stock-item-template">
    <div class="row g-2 mb-2 stock-item-row">
        <div class="col">
            <select class="form-select" required>
                <option value="" disabled selected>Select Stock Item</option>
                @foreach ($menuItems['data']['inventoryOptions'] as $inventoryItem)
                    <option value="{{ $inventoryItem['id'] }}">{{ $inventoryItem['itemName'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="col">
            <input type="number" step="0.001" class="form-control" placeholder="Quantity" required>
        </div>
        <div class="col-auto">
            <button type="button" class="btn btn-danger btn-sm remove-stock-item"
                onclick="removeStockItemRow(this)">&times;</button>
        </div>
    </div>
</template>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize DataTable

        // Function to dynamically add stock item rows
        window.addStockItemRow = function(menuId) {
            const container = document.getElementById(`stockItemsContainer${menuId}`);
            const template = document.getElementById('stock-item-template').content.cloneNode(true);

            // Update `name` attributes dynamically based on the row count
            const index = container.querySelectorAll('.stock-item-row').length;
            template.querySelector('select').setAttribute('name', `stockItems[${index}][stockId]`);
            template.querySelector('input').setAttribute('name', `stockItems[${index}][quantity]`);

            container.appendChild(template);
        };

        // Function to remove a stock item row
        window.removeStockItemRow = function(button) {
            button.closest('.stock-item-row').remove();
        };
    });
</script>
