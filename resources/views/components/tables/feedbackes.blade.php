<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body class="app">
    @include('partials.header')

    <div class="app-wrapper">
        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container">
                <div class="row">
                    <!-- Sidebar for Contacts -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h5>Contacts</h5>
                            </div>
                            <div class="card-body chat-sidebar">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="User">
                                        <div>
                                            <strong>John Doe</strong>
                                            <p class="mb-0 text-muted">Hey! What's up?</p>
                                        </div>
                                    </li>
                                    <li class="list-group-item d-flex align-items-center">
                                        <img src="https://via.placeholder.com/40" class="rounded-circle me-3" alt="User">
                                        <div>
                                            <strong>Jane Smith</strong>
                                            <p class="mb-0 text-muted">Let's catch up later.</p>
                                        </div>
                                    </li>
                                    <!-- Add more contacts here -->
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Chat Window -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Chat with John Doe</h5>
                                <button class="btn btn-sm btn-secondary">Options</button>
                            </div>
                            <div class="card-body chat-window">
                                <div class="chat-message received">
                                    <div class="d-flex">
                                        <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="User">
                                        <div>
                                            <p class="bg-light p-2 rounded">Hey! How are you?</p>
                                            <small class="text-muted">10:15 AM</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-message sent text-end">
                                    <p class="bg-primary text-white p-2 rounded">I'm good, how about you?</p>
                                    <small class="text-muted">10:16 AM</small>
                                </div>
                                <!-- Add more chat messages here -->
                            </div>
                            <div class="card-footer">
                                <form id="chatForm" class="d-flex">
                                    <input type="text" class="form-control me-2" placeholder="Type a message..." required>
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer')

    <!-- Add custom styles -->
    <style>
        .chat-sidebar {
            height: 70vh;
            overflow-y: auto;
        }
        .chat-window {
            height: 60vh;
            overflow-y: auto;
            background-color: #f8f9fa;
            padding: 10px;
        }
        .chat-message {
            margin-bottom: 15px;
        }
        .chat-message p {
            display: inline-block;
            max-width: 75%;
        }
    </style>
</body>
</html>
