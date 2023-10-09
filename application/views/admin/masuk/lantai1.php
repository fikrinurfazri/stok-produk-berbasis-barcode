<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">Sample Page</h5>
            <table class="table table-striped">
                <thead>
                    <th>NO</th>
                    <th>MODEL</th>
                    <th>WARNA</th>
                    <th>JUMLAH</th>
                    <!-- <th>ACT</th> -->
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($lantai1 as $p) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $p->models ?></td>
                            <td><?= $p->collor ?></td>
                            <td><?= $p->jumlah ?></td>


                        </tr>
                    <?php endforeach ?>
                </tbody>

            </table>
        </div>
    </div>
</div>