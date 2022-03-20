<?php
include_once "../utils.php";
include "./header.php";

$sql = "SELECT doctors.id,doctors.name, doctors.photo, doctors.saturday, doctors.sunday, doctors.monday, doctors.tuesday, doctors.wednesday, doctors.thursday, doctors.friday , departments.name as department FROM doctors  LEFT JOIN departments ON doctors.department_id=departments.id;";
$result = mysqli_query($con, $sql);
// echo $con->error; die;
?>
<script>
  $(document).ready(function() {
    $('#doctors').DataTable({
      language: {
        url: '/hospital/assets/datatable.arabic.json'
      }
    });
  });
</script>
<div class="container pt-4">
  <a href="/hospital/dashboard/edit-doctor.php" class="btn btn-primary">add doctor</a>
  <div class="card mt-4">
    <div class="card-body">
      <table id="doctors">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">department</th>
            <th scope="col">photo</th>
            <th scope="col">saturday</th>
            <th scope="col">sunday</th>
            <th scope="col">monday</th>
            <th scope="col">tuesdey</th>
            <th scope="col">wednesday</th>
            <th scope="col">thursday</th>
            <th scope="col">friday</th>

          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
              <tr>
                <th scope="row"><?= $row["id"]; ?></th>
                <td><?= $row["name"]; ?></td>
                <td><?= $row["department"]; ?></td>
                <td><?= $row["photo"]; ?></td>
                <td><?= $row["saturday"]; ?></td>
                <td><?= $row["sunday"]; ?></td>
                <td><?= $row["monday"]; ?></td>
                <td><?= $row["tuesday"]; ?></td>
                <td><?= $row["wednesday"]; ?></td>
                <td><?= $row["thursday"]; ?></td>
                <td><?= $row["friday"]; ?></td>
                <td>
                <a href="/hospital/dashboard/edit-doctor.php?id=<?= $row["id"] ?>" class="btn btn-outline-primary">edit</a>
                  <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $row["id"] ?>">
                    delet
                  </button>
                  <div class="modal fade" id="deleteModal<?= $row["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">delete doctor: <?= $row["name"] ?></h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        are sure of the deleting process?
                         </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cancel</button>
                          <form style="display:inline;" action="delete-doctors.php" method="POST">
                            <input type="hidden" name="id" value="<?= $row["id"]; ?>">
                            <button type="submit" class="btn btn-danger">Confirm deletion</button>
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

