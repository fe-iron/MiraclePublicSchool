<?php include_once 'inc/head.php'; ?>
<link rel="stylesheet" type="text/css" href="style.css">

<body>


    <style type="text/css">
        .admin-navbar {
            background-image: linear-gradient(to right, #4a48bd, #3d1fe4);
        }

        .card img {
            padding-top: 5px;
            height: 50px;
            width: 55px;
            margin: 0 auto;


        }

        .btn-success {
            color: #fff;
            background-color: #0ea66e;
            border-color: #0ea66e;
        }

        .card-title {
            margin-bottom: 0rem;
        }

        .card-body {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            min-height: 1px;
            padding: 2rem 3.25rem;
        }

        .card-text {
            font-size: 12px;
        }


        @media (min-width: 700px) {
            .open-nav {
                display: none;
            }
        }
    </style>


    <nav class="navbar navbar-light admin-navbar  py-xl-4 py-md-4  sticky-top">
        <a class="navbar-brand"><span class="open-nav" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>Admin Panel</a>
        <form class="form-inline">
            <a href="logout.php" type="button" class="btn btn-secondary">
                LOGOUT
            </a>
        </form>
    </nav>
</body>