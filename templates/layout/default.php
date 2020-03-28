<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Budget: <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('app') ?>

    <?= $this->Html->script('jquery-3.4.1.min') ?>
    <?= $this->Html->script('bootstrap.min') ?>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <?= $this->Html->link('Budget', ['controller' => 'Home', 'action' => 'index'], ['class' => 'navbar-brand']) ?>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <?= $this->Html->link('Expenses', ['controller' => 'Expenses', 'action' => 'index'], ['class' => 'nav-link']) ?>
                </li>
            </ul>
        </div>
    </nav>
    <main>
        <div class="container mt-4">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
