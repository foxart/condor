<style>
    table {
        font-size: 20px;
        border-collapse: collapse;
        width: 100%;
    }

    td {
        border: solid 1px black;
        border-collapse: collapse;
    }

    ul {
        font-size: 30px;
        list-style-type: none;
        padding: 0;
    }

    li {
        display: inline;
        margin-right: 10px;
    }

    a {
        text-decoration: none;
        color: #409CFF;
    }

    a:hover {
        text-decoration: underline;
        color: #007BFF;
    }
</style>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Simple Menu</title>
    </head>
    <body>
        <nav>
            <ul>
                <?php
					foreach ($menuConfig as $item) {
						$title = $item->getTitle();
                        $link = $item->getRoute();
                        echo "<li><a href='$link'>$title</a></li>";
                    }
                ?>
            </ul>
        </nav>
        <div id="content">
            <h1>
                <?php echo $headerTitle ?>
            </h1>
            <div>
                <?php echo $routerContent ?>
            </div>
        </div>
    </body>
</html>
