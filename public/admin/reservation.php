<?php
require_once("../config.php");
include("./includes/header.php");
?>
  <body>
    <main>
    <section>
        <table
          id="dtVerticalScrollExample"
          class="table table-striped table-bordered small"
          cellspacing="0"
        >
          <thead>
            <tr>
            <th class="th-sm">Reservation Id</th>
            <th class="th-sm">User Id</th>
            <th class="th-sm">Room Id</th>
              <th class="th-sm">Check in date</th>
              <th class="th-sm">Check out date</th>
              <th class="th-sm">Price</th>
            </tr>
          </thead>
          <tbody>
            <?php

                    $sql = "SELECT * FROM reservations LEFT JOIN rooms as room ON room.room_id = reservations.room_id LEFT JOIN payment as p ON p.reservation_id = reservations.reservation_id";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach($rows as $row) {

               
                ?>
                  <tr>
                  <td><?= $row["reservation_id"] ?></td>
                  <td><?= $row["user_id"] ?></td>
                  <td><?= $row["room_id"] ?></td>
                  <td><?= $row["check_in_date"] ?></td>
                  <td><?= $row["check_out_date"] ?></td>
                  <td><?= $row["amount"] ?></td>
                  </tr>
                <?php 
    }
                ?>
                </tbody>
                </table>
        </div>
      </div>
    </div>
    </section>
    </main>
  <?php include("./includes/footer.php"); ?>
  <script>
    $(document).ready(function() {
        $("nav").eq(0).addClass("bg-dark");
        $("nav").eq(0).addClass("navbar-dark");
        // bg-dark navbar-dark 
    });
  </script>
</body>
</html>
