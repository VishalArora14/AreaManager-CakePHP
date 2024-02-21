<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #fff;
    }

    .confirmation-container {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border: 5px solid black;
        
    }

    h2 {
        color: #333;
    }

    p {
        color: #666;
    }

    .confirmation-buttons {
        margin-top: 20px;
        text-align: right;
    }

    .confirmation-buttons button {
        padding: 10px 15px;
        margin-left: 10px;
        cursor: pointer;
        border: none;
        border-radius: 3px;
        font-size: 14px;
        color: #fff;
    }

    .confirmation-buttons button.yes {
        background-color: #4caf50;
    }

    .confirmation-buttons button.no {
        background-color: #f44336;
    }
</style>

<div class="confirmation-container">
    <h2>Confirm Deletion</h2>
    <p>Are you sure you want to delete this field?</p>

    <?= $this->Form->create(null, ['url' => ['action' => 'delete', $areaLevel->id]]) ?>
    <div class="confirmation-buttons">
        <?= $this->Form->button('Yes', ['name' => 'confirmation', 'value' => 'Yes', 'class' => 'yes']) ?>
        <?= $this->Form->button('No', ['name' => 'confirmation', 'value' => 'No', 'class' => 'no']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>