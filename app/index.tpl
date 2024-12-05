<style>
    body {
        padding: 22px;
        font-size: 24px;
    }

    table {
        font-size: 18px;
        border-collapse: collapse;
        width: 100%;
    }

    td {
        border: solid 1px black;
        border-collapse: collapse;
        padding: 0.5cap;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    li {
        display: inline;
        padding: 0;
    }
    li:after {
        content: "|";
    }
    li:last-child:after {
        content: "";
    }


    a {
        text-decoration: none;
        color: #409CFF;
    }

    a:hover {
        text-decoration: underline;
        color: #007BFF;
    }

    .error, .debug, .info {
        display: block;
        font-style: italic;
        padding-left: 20px;
        border-left: 2px solid #ccc;
        margin-bottom: 10px;
        font-size: 12px;
    }

    .error {
        color: red;
    }

    .debug {
        color: gray;
    }

    .info {
        color: blue;
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
                <?php foreach ($menuConfig as $menu): ?>
                <li>
                    <a href="<?= htmlSpecialChars($menu->getRoute()) ?>">
                        <?= htmlSpecialChars($menu->getTitle()) ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <div id="content">
            <h1>
                <?= htmlSpecialChars($headerTitle) ?>
            </h1>
            <div>
                <?= $routerContent ?>
            </div>
        </div>
    </body>
</html>
