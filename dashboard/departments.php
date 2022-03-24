<?php

$TITLE = '';

include_once "../utils.php";
include "./header.php";

$sql = "SELECT * FROM departments";
$result = mysqli_query($con, $sql);
?>

<script>
  $(document).ready(function() {
    $('#departments').DataTable({
      language: {
        url: '/hospital/assets/datatable.arabic.json'
      }
    });
  });
</script>
<div class="container pt-4">
  <a href="/hospital/dashboard/edit_departments.php" class="btn btn-primary"> edit departments </a>
  <div class="card mt-4">
    <div class="card-body">
      <table id="departments">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">description</th>
            <th scope="col">photo</th>

          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
              <tr>
                <th scope="row"><?= $row["id"]; ?></th>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["description"]; ?></td>
                <td><?= $row["photo"]; ?></td>
                <td>
                  <a href="/hospital/dashboard/edit_departments.php?id=<?= $row["id"] ?>" class="btn btn-outline-primary">تحرير</a>
                  <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row["id"] ?>">
                    حذف
                  </button>
                  <div class="modal fade" id="deleteModal<?= $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">حذف القسم: <?= $row["name"] ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          هل أنت متأكد من عملية الحذف؟
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                          <form style="display:inline;" action="delete_departments.php" method="POST">
                            <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                            <button type="submit" class="btn btn-danger">تأكيد الحذف</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
          <?php }
          } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php
include "./footer.php";
