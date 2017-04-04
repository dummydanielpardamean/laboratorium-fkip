<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sistem Laboratorium</title>
    <link rel="stylesheet" href="/css/flatly.css">
    <script src="/js/jquery-2.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
		$(document).ready(function () {
			$('dropdown-toggle').dropdown()
		});
    </script>

    <style>
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        li.avatar {
            margin-bottom: 10px;
            padding: 10px;
        }

        img.avatar {
            border-radius: 50%;
            height: 50px;
        }

        span.avatar-name {
            margin-left: 10px;
            font-size: 14px;
            color: #Fff;
        }

        .nav-stacked {
            background-color: #1a242f;
        }

        div.dashboard {
            padding-left: 0;
        }

        div.dashboard-menu {
            /*padding-right: 0;*/
        }

        div.dashboard-main {
            padding-left: 0;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Sistem Laboratorium</a>
            <a href="" class="navbar-text navbar-right">Logout</a>
        </div>
    </div>
</nav>
<div class="container-fluid dashboard">
    <div class="row">
        <div class="col-md-2 dashboard-menu">
            <ul class="nav nav-pills nav-stacked">
                <li class="avatar">
                    <img class="avatar"
                         src="/images/avatar.jpeg"/>
                    <span class="avatar-name">Hello, John Doe</span>
                </li>
                <li><a href="">Pengguna</a></li>
                <li><a href="/jadwal">Jadwal</a></li>
                <li><a href="">Ruang</a></li>
            </ul>
        </div>
        <div class="col-md-10 dashboard-main">
        </div>
    </div>
</div>
</body>
</html>