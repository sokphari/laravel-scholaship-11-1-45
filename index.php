<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<style>
    /* Dark Theme Glassmorphism Modal Styles */
        .cool-modal .modal-content {
            background: rgba(30, 41, 59, 0.95);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            color: #f8fafc;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
        }

        .cool-modal .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 1.5rem;
        }

        .cool-modal .modal-title {
            font-weight: 700;
            letter-spacing: -0.3px;
            color: #ffffff;
        }

        /* White custom close button wrapper */
        .cool-modal .btn-close {
            filter: invert(1) grayscale(1) brightness(2);
            opacity: 0.7;
            transition: opacity 0.2s;
        }
        .cool-modal .btn-close:hover { opacity: 1; }

        .cool-modal .modal-body {
            padding: 1.5rem;
        }

        /* Modern Input Field Groups with Built-in Icons */
        .input-group-custom {
            position: relative;
            margin-bottom: 1.25rem;
        }

        .input-group-custom i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1rem;
            z-index: 5;
            transition: color 0.3s;
        }

        .input-group-custom .form-control,
        .input-group-custom .form-select {
            background-color: #1e293b !important;
            border: 1px solid #334155;
            border-radius: 10px;
            color: #ffffff !important;
            padding: 12px 12px 12px 42px; /* Shifts text right to fit the icon */
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Placeholder text color */
        .input-group-custom .form-control::placeholder {
            color: #64748b;
        }

        /* Input Focus Glow Animation */
        .input-group-custom .form-control:focus,
        .input-group-custom .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
            background-color: #24344d !important;
        }

        .input-group-custom .form-control:focus ~ i {
            color: #38bdf8; /* Icon lights up when input is active */
        }

        /* Modal Action Footer Layout */
        .cool-modal .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.08);
            padding: 1.25rem 1.5rem;
        }

        /* Footer buttons styling */
        .cool-modal .btn-cancel {
            background: #334155;
            border: none;
            color: #cbd5e1;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px 20px;
            transition: background 0.2s;
        }
        .cool-modal .btn-cancel:hover { background: #475569; color: #fff; }

        .cool-modal .btn-submit {
            background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%);
            border: none;
            color: #ffffff;
            font-weight: 600;
            border-radius: 10px;
            padding: 10px 24px;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            transition: all 0.25s ease;
        }
        .cool-modal .btn-submit:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(6, 182, 212, 0.4);
            background: linear-gradient(135deg, #22d3ee 0%, #2563eb 100%);
        }
    /* Modern Header Container Styling */
    .header-section {
        background: rgba(30, 41, 59, 0.4);
        padding: 1rem 1.5rem;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.05);
        align-items: center;
        margin-bottom: 1.5rem;
    }

    /* Cool Title styling */
    .cool-title {
        color: #ffffff;
        font-weight: 700;
        letter-spacing: -0.5px;
        position: relative;
    }

    .cool-title::after {
        content: '';
        display: block;
        width: 40px;
        height: 4px;
        background: linear-gradient(90deg, #06b6d4, #3b82f6);
        border-radius: 2px;
        margin-top: 4px;
    }

    /* The Premium "Add User" Button */
    .btn-add-user {
        background: linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%) !important;
        border: none !important;
        border-radius: 10px !important;
        font-weight: 600 !important;
        letter-spacing: 0.3px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        /* Space between icon and text */
        box-shadow: 0 4px 14px rgba(59, 130, 246, 0.3);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    /* Hover & Active Effects */
    .btn-add-user:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(6, 182, 212, 0.5);
        background: linear-gradient(135deg, #22d3ee 0%, #2563eb 100%) !important;
    }

    .btn-add-user:active {
        transform: translateY(0) !important;
        box-shadow: 0 3px 10px rgba(59, 130, 246, 0.2) !important;
    }

    * {
        font-family: "sans-serif";
    }

    /* Base Reset & Styling */
    body {
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        background-color: #0f172a;
        /* Cool dark background */
        color: #f8fafc;
        padding: 2rem;
        display: flex;
        justify-content: center;
    }

    /* Container & Table Design */
    .table-container {
        width: 100%;
        max-width: 1100px;
        background: rgba(30, 41, 59, 0.7);
        backdrop-filter: blur(8px);
        border-radius: 16px;
        padding: 1.5rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.05);
        animation: fadeIn 0.6s ease-out;
    }

    .cool-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 8px;
        /* Gives a nice "floating row" effect */
        text-align: left;
    }

    /* Headers */
    .cool-table th {
        color: #94a3b8;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 12px 16px;
        border-bottom: 2px solid #334155;
    }

    /* Rows & Cells */
    .cool-table tbody tr {
        background-color: #1e293b;
        transition: all 0.3s ease;
    }

    .cool-table tbody tr:hover {
        transform: translateY(-2px);
        background-color: #24344d;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .cool-table td {
        padding: 16px;
        vertical-align: middle;
        font-size: 0.95rem;
    }

    /* Rounding row corners */
    .cool-table tbody tr td:first-child {
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        font-weight: 600;
        color: #38bdf8;
        /* Highlighted ID */
    }

    .cool-table tbody tr td:last-child {
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    /* Profile Image Style */
    .profile-img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid #38bdf8;
        background-color: #334155;
    }

    /* Action Buttons */
    .btn-action {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 1.2rem;
        margin-right: 8px;
        padding: 6px;
        border-radius: 6px;
        transition: background 0.2s;
    }

    .btn-edit {
        color: #f59e0b;
    }

    .btn-edit:hover {
        background: rgba(245, 158, 11, 0.1);
    }

    .btn-delete {
        color: #ef4444;
    }

    .btn-delete:hover {
        background: rgba(239, 68, 68, 0.1);
    }

    /* Animation */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<body>
    <div class="container mt-4">
        <!-- Your HTML Component with Custom Styles Applied -->
        <div class="d-flex justify-content-between header-section">
            <h1 class="fs-2 cool-title m-0">List User</h1>
            <button class="btn btn-primary text-white px-4 py-2 btn-add-user" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-user-plus"></i> Add User
            </button>
        </div>
        <table class="cool-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="TableUser">
                
            </tbody>
        </table>
    </div>
    <!-- Modal -->
   <!-- Refactored Cool Modal -->
    <div class="modal fade cool-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered"> <!-- Centered it for a nicer display -->
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Information User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" id="id" name="id">
                        
                        <!-- Full Name Field -->
                        <div class="input-group-custom">
                            <input type="text" id="name" class="form-control" placeholder="Enter Full Name" required>
                            <i class="fa-solid fa-user"></i>
                        </div>

                        <!-- Gender Selector (Upgraded from text input to Select Box for safety) -->
                        <div class="input-group-custom">
                            <select id="gender" class="form-select" required>
                                <option value="" disabled selected hidden>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <i class="fa-solid fa-venus-mars"></i>
                        </div>

                        <!-- Address Field -->
                        <div class="input-group-custom">
                            <input type="text" id="address" class="form-control" placeholder="Phnom Penh, Cambodia">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>

                        <!-- Phone Number Field -->
                        <div class="input-group-custom">
                            <input type="tel" id="phone" class="form-control" placeholder="+855 12 345 678">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="save" class="btn btn-submit">Create User</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="app.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>


</html>