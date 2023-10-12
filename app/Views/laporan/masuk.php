<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('temp') ?>/assets/images/favicon.ico" />
    <title>Document</title>
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/css/report.css" rel="stylesheet" />
</head>

<body>
    <div class="container" ng-controller="detailKeluargaController" id="cetak">
        <div class="col-12">
            <table>
                <tr>
                    <td class="text-center" style="font-size:16px"><strong>LABORAN <br>
                            SURAT MASUK</strong>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-12 mb-3">
            <table class="border thick" width="99%">
                <thead>
                    <tr class="border thick">
                        <th>No</th>
                        <th>Tanggal Surat</th>
                        <th>No Surat</th>
                        <th>Perihal</th>
                        <th>Sifat Surat</th>
                        <th>Pengirim</th>
                        <th>Jenis Surat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $value) : ?>
                        <tr class="tr">
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['tanggal'] ?></td>
                            <td><?= $value['no_surat'] ?></td>
                            <td><?= $value['perihal'] ?></td>
                            <td><?= $value['sifat_surat'] ?></td>
                            <td><?= $value['pengirim'] ?></td>
                            <td><?= $value['nama_jenis'] ?></td>

                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
    <script>
        printJS({
            printable: 'cetak',
            type: 'html',
            css: "<?= base_url() ?>/assets/css/report.css",
        })
        window.onfocus = function() {
            // window.close();
        }
    </script>
</body>

</html>