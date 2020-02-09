<div class="modal fade" id="addMenuModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Menu Item </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    <?php if(isset($_GET['error'])) { ?>
        <input type="hidden" id="errorAddMenu">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong><?php echo $_GET['error'] ?></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>

        <form method="post" action="ajax/addFoodItem.php" enctype="multipart/form-data" id="add-food-item-form">
            <label for="item-name">Item Name *</label>
            <input required type="text" name="item_name" placeholder="Item Name" id="item-name" class="form-control">
            <br>
            <label for="item-type">Food Type *</label>
            <select required name="item_type" id="item-type" class="form-control">

            <?php
                $pref = $conn->query("SELECT * FROM food_preference ORDER BY id")->fetchAll();
                foreach ($pref as $row) {
            ?>
                    <option name='preference' value="<?php echo $row['id']; ?>">
                        <?php echo $row['name']; ?>
                    </option>
            <?php
                }
            ?>
            </select>
            <br>
            <div class="label-container">
                <image class="d-none" id="preview-menu-item-image">
                <label for="food-photo" class="food-photo-label">Photo</label>
                <input type="file" name="food_photo" id="food-photo" accept="image/*" class="d-none">
            </div>
            <br>
            <input name="foodItemSubmit" type="submit" class="btn btn-block btn-primary" value="ADD ITEM">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
      </div>
    </div>
  </div>
</div>