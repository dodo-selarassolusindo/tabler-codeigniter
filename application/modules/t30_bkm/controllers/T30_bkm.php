<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T30_bkm extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('T30_bkm_model');
        $this->load->library('form_validation');
        $this->load->model('t31_bkm_detail/T31_bkm_detail_model');
        $this->load->model('t07_kolom_payment/T07_kolom_payment_model');
        $this->load->model('t04_package/T04_package_model');
        $this->load->model('t05_agent/T05_agent_model');
        $this->load->model('t32_bkm_detail_payment/T32_bkm_detail_payment_model');
        $this->load->model('t33_pembayaran/T33_pembayaran_model');
        $this->load->model('t00_mata_uang/T00_mata_uang_model');
        $this->load->model('t02_jenis_selisih_pembayaran/T02_jenis_selisih_pembayaran_model');
    }

    public function index()
    {

        $t31_bkm_detail = '';
        $t33_pembayaran = '';

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;

        if ($q <> '') {
            $config['base_url'] = base_url() . 't30_bkm/pembayaran?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't30_bkm/pembayaran?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't30_bkm/pembayaran';
            $config['first_url'] = base_url() . 't30_bkm/pembayaran';
        }

        $config['total_rows'] = $this->T30_bkm_model->total_rows($q);
        $t30_bkm = $this->T30_bkm_model->get_limit_data($config['per_page'], $start, $q);

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't30_bkm_data' => $t30_bkm,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $t30_bkm = $this->load->view('t30_bkm/t30_bkm_w_search', $data, true);
        $kembali = '';

        $data = array(
            't30_bkm' => $t30_bkm,
            't31_bkm_detail' => $t31_bkm_detail,
            't33_pembayaran' => $t33_pembayaran,
            'kembali' => $kembali,
        );
        $this->load->view('t30_bkm/t30_bkm_list', $data);

    }

    public function hitung_selisih()
    {
        // code...
        // echo $this->T45_invvendor_model->getNewNomorInvvendor($_POST['tgl']);
        // pre($_POST['bkm_detail']);
        // echo '<script>alert("g")</script>';
        echo $_POST['jumlah'] - (($this->T31_bkm_detail_model->get_price_list($_POST['bkm_detail']) * $_POST['rate_usd']) +
            ($this->T31_bkm_detail_model->get_price_list($_POST['bkm_detail_utama']) * $_POST['rate_usd']));
        // echo $this->T31_bkm_detail_model->get_price_list($_POST['bkm_detail']);
    }

    public function detail($bkm)
    {

        $t33_pembayaran = '';

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;

        if ($q <> '') {
            $config['base_url'] = base_url() . 't30_bkm/detail/'.$bkm.'?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't30_bkm/detail/'.$bkm.'?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't30_bkm/detail/'.$bkm;
            $config['first_url'] = base_url() . 't30_bkm/detail/'.$bkm;
        }

        $config['total_rows'] = $this->T31_bkm_detail_model->total_rows($q, $bkm);
        $t30_bkm = $this->T30_bkm_model->get_by_id($bkm);
        $t31_bkm_detail = $this->T31_bkm_detail_model->get_limit_data_2($config['per_page'], $start, $q, $bkm);
        // $t31_bkm_detail = $this->T31_bkm_detail_model->get_limit_data($config['per_page'], $start, $q, $bkm);
        // pre($t31_bkm_detail); exit;

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't30_bkm_data' => $t30_bkm,
            'start' => $start,
        );
        $t30_bkm = $this->load->view('t30_bkm/t30_bkm_wo_search', $data, true);

        $data = array(
            't31_bkm_detail_data' => $t31_bkm_detail,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'bkm' => $bkm,
        );
        $t31_bkm_detail = $this->load->view('t31_bkm_detail/t31_bkm_detail_w_search', $data, true);
        $kembali = 't30_bkm';

        $data = array(
            't30_bkm' => $t30_bkm,
            't31_bkm_detail' => $t31_bkm_detail,
            't33_pembayaran' => $t33_pembayaran,
            'kembali' => $kembali,
        );
        $this->load->view('t30_bkm/t30_bkm_list', $data);

    }

    public function pembayaran($bkm, $bkm_detail)
    {

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 't30_bkm/pembayaran/'.$bkm.'/'.$bkm_detail.'?q=' . urlencode($q);
            $config['first_url'] = base_url() . 't30_bkm/pembayaran/'.$bkm.'/'.$bkm_detail.'?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 't30_bkm/pembayaran/'.$bkm.'/'.$bkm_detail;
            $config['first_url'] = base_url() . 't30_bkm/pembayaran/'.$bkm.'/'.$bkm_detail;
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['full_tag_open'] = '<ul class="pagination m-0 ms-auto">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = array('class' => 'page-link');
        $config['num_links'] = 5;

        // bkm master
        $t30_bkm = $this->T30_bkm_model->get_by_id($bkm);
        // pre($t30_bkm); exit;
        $rate_usd = $t30_bkm->rate_usd;
        $rate_aud = $t30_bkm->rate_aud;
        $data = array(
            't30_bkm_data' => $t30_bkm,
            'start' => $start,
        );
        $t30_bkm = $this->load->view('t30_bkm/t30_bkm_wo_search', $data, true);

        // bkm detail
        $t31_bkm_detail = $this->T31_bkm_detail_model->get_by_id_2($bkm_detail);
        $data = array(
            't31_bkm_detail_data' => $t31_bkm_detail,
            'start' => $start,
        );
        $t31_bkm_detail = $this->load->view('t31_bkm_detail/t31_bkm_detail_wo_search', $data, true);


        /**
         * pembayaran
         */
        $arr_bayar = $this->T33_pembayaran_model->get_bayar($bkm);
        /**
         *        Array
         *        (
         *            [0] => Array
         *                (
         *                    [bkm_detail] => 6
         *                    [dibayar_oleh] => 6
         *                )
         *
         *            [1] => Array
         *                (
         *                    [bkm_detail] => 1
         *                    [dibayar_oleh] => 1
         *                )
         *
         *        )
         * arr_bayar :: array berisi data tamu (BKM-DETAIL) berdasarkan BKM-MASTER terpilih
         */

        // pembayaran dirinya sendiri
        $price = 0; // price
        $price_rp = 0; // price rupiah
        $jumlah = 0; // payment
        $selisih_jumlah = 0; // selisih antara price dan payment

        $t33_pembayaran_1 = $this->T33_pembayaran_model->get_by_bkm_detail($bkm_detail);
        /**
         *
         * t33_pembayaran_1 :: data tamu terpilih
         *
         */

        $price = $this->T31_bkm_detail_model->get_by_id($bkm_detail)->price_1_value;
        $rate = $this->T31_bkm_detail_model->get_by_id($bkm_detail)->mata_uang == 'USD' ? $rate_usd : $rate_aud;
        $price_rp_utama = $price * $rate;

        if (!$t33_pembayaran_1) {
            /**
             * jika belum ada data pembayaran
             */
            // $price = $this->T31_bkm_detail_model->get_by_id($bkm_detail)->price_1_value;
            // $rate = $this->T31_bkm_detail_model->get_by_id($bkm_detail)->mata_uang == 'USD' ? $rate_usd : $rate_aud;
            // $price_rp = $price * $rate;
            $jumlah = 0; // payment
            $selisih_jumlah = 0; // selisih antara price dan payment
            $t33_pembayaran_1 = (object) array(
                'bkm_detail' => $bkm_detail,
                'mata_uang' => -1,
                // 'jumlah' => $jumlah,
                'price' => $price,
                'jumlah' => $jumlah,
                'selisih' => -1,
                'selisih_mata_uang' => -1,
                'selisih_jumlah' => -($price * $rate),
            );
        } else {
            // $price = $this->T31_bkm_detail_model->get_by_id($bkm_detail)->price_1_value;
            // $rate = $this->T31_bkm_detail_model->get_by_id($bkm_detail)->mata_uang == 'USD' ? $rate_usd : $rate_aud;
            $jumlah = $t33_pembayaran_1->jumlah;
            if ($t33_pembayaran_1->selisih === null) {
                /**
                 * jika sudah ada data pembayaran tapi belum ada data selisih
                 */
                $t33_pembayaran_1->selisih_jumlah = $jumlah - $price_rp_utama;
            }
        }

        // array "dibayar oleh" tamu terpilih
        $tamu_terbayar = array();
        $t33_pembayaran_2 = $this->T33_pembayaran_model->get_all_by_dibayar_oleh($bkm_detail);

        if ($t33_pembayaran_2) {
            /**
             * jika sudah ada data tamu yang dibayarkan oleh tamu terpilih
             */
            foreach($t33_pembayaran_2 as $row) {
                $price = $this->T31_bkm_detail_model->get_by_id($row->bkm_detail)->price_1_value;
                $rate = $this->T31_bkm_detail_model->get_by_id($row->bkm_detail)->mata_uang == 'USD' ? $rate_usd : $rate_aud;
                $price_rp += ($price * $rate);
                $jumlah += ($price * $rate);
                $selisih_jumlah = 0;
                $tamu_terbayar[] = $row->bkm_detail;
            }
        }

        // $price_rp += $price * $rate;

        $kembali = 't30_bkm/detail/'.$bkm;

        $data = array(
            'action' => site_url('t30_bkm/pembayaran_action'),
            't33_pembayaran_1' => $t33_pembayaran_1,
            't31_bkm_detail_all_data' => $this->T31_bkm_detail_model->get_all_by_bkm_not_bkm_detail($bkm, $bkm_detail),
            'kembali' => $kembali,
            'tamu_terbayar' => $tamu_terbayar,
            'arr_bayar' => $arr_bayar,
            'rate_usd' => $rate_usd,
            'rate_aud' => $rate_aud,
            'price_rp' => $price_rp,
            'price_rp_utama' => $price_rp_utama,
        );
        $t33_pembayaran = $this->load->view('t33_pembayaran/t33_pembayaran_form', $data, true);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            't30_bkm' => $t30_bkm,
            't31_bkm_detail' => $t31_bkm_detail,
            't33_pembayaran' => $t33_pembayaran,
        );
        $this->load->view('t30_bkm/t30_bkm_list', $data);

    }

    public function pembayaran_action()
    {
        // proses terbayar oleh diri sendiri
        $bkm_detail = $this->input->post('bkm_detail', true);
        if ($this->T33_pembayaran_model->get_by_bkm_detail($bkm_detail)) {
            if ($this->input->post('jumlah',TRUE) == 0) {
                // jika jumlah bayar = 0 maka hapus pembayaran
                $this->T33_pembayaran_model->delete_by_bkm_detail($bkm_detail);
                $this->session->set_flashdata('message', 'Update Data Success');
            } else {
                // jika jumlah bayar tidak 0
                // update by bkm_detail
                $data = array(
                    'mata_uang' => $this->input->post('mata_uang',TRUE),
                    'jumlah' => $this->input->post('jumlah',TRUE),
                    'selisih' => $this->input->post('selisih',TRUE),
                    'selisih_mata_uang' => 1,
                    'selisih_jumlah' => $this->input->post('selisih_jumlah',TRUE),
                );
                $this->T33_pembayaran_model->update_by_bkm_detail($this->input->post('bkm_detail', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Data Success');
                // redirect(site_url($this->input->post('kembali', true)));
            }
        } else {
            // insert data baru
            $data = array(
                'bkm_detail' => $this->input->post('bkm_detail',TRUE),
                'dibayar_oleh' => $this->input->post('bkm_detail',TRUE),
                'mata_uang' => $this->input->post('mata_uang',TRUE),
                'jumlah' => $this->input->post('jumlah',TRUE),
                'selisih' => $this->input->post('selisih',TRUE),
                'selisih_mata_uang' => 1,
                'selisih_jumlah' => $this->input->post('selisih_jumlah',TRUE),
            );
            $this->T33_pembayaran_model->insert($data);
            $this->session->set_flashdata('message', 'Insert Data Success');
            // redirect(site_url($this->input->post('kembali', true)));
        }

        // proses terbayar oleh tamu terpilih
        // hapus dulu data yang sudah tersimpan
        // hapus berdasarkan dibayar_oleh by tamu terpilih
        $this->T33_pembayaran_model->delete_by_dibayar_oleh_not_bkm_detail($bkm_detail);
        $data = $this->input->post();
        foreach ($data['bkm_detail_for'] as $key => $item) {
            $detail = [
                'bkm_detail' => $item,
                'dibayar_oleh' => $bkm_detail,
            ];
            $this->T33_pembayaran_model->insert($detail);
        }

        /**
         * simpan / update data selisih bayar
         */
        $data = array(

        );

        redirect(site_url($this->input->post('kembali', true)));
    }

    public function import()
    {
        $data = array(
            'button' => 'Proses',
            'action' => site_url('t30_bkm/import_action'),
        );
        $this->load->view('t30_bkm/t30_bkm_import', $data);
    }

    public function import_action()
    {
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $config['upload_path'] = realpath('excel');
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['max_size'] = '10000';
        $config['encrypt_name'] = true;

        $this->load->library('upload', $config);

        /**
         * proses upload gagal
         */
        if (!$this->upload->do_upload()) {
            $this->session->set_flashdata('message', 'Proses import data gagal ! ' . strip_tags($this->upload->display_errors()));
            redirect('t30_bkm');
        }

        /**
         * deklarasi kolom payment
         */
        $kolom_payment = $this->T07_kolom_payment_model->get_all();

        /**
         * deklarasi file excel
         */
        $data_upload = $this->upload->data();
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $data_upload['file_name']);
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, false, true);
        // pre($sheet); exit;
        // pre($loadexcel); exit;

        /**
         * ambil data nomor BKM
         */
        $nomor_bkm = $sheet[2]['A'];

        /**
         * check duplikasi nomor BKM
         */
        if ($this->T30_bkm_model->get_by_nomor_bkm($nomor_bkm) > 0) {
            /**
             * nomor BKM sudah ada
             */
            $this->session->set_flashdata('message', 'Nomor BKM '.$nomor_bkm.' sudah ada, proses import data tidak dilanjutkan !');
            redirect(site_url('t30_bkm'));
        }

        /**
         * simpan data BKM sebagai data master
         */
        $data = array(
            'nomor' => $sheet[2]['A'],
            'tanggal' => date_ymd($sheet[4]['A']),
            'rate_usd' => $sheet[3]['F'], // $spreadsheet->getActiveSheet()->getCellByColumnAndRow(6, 3)->getValue(),
            'rate_aud' => $sheet[3]['H'], // $spreadsheet->getActiveSheet()->getCellByColumnAndRow(8, 3)->getValue(),
        );
        $this->T30_bkm_model->insert($data);

        /**
         * ambil id data bkm terbaru
         */
        $bkm = $this->db->insert_id();

        /**
         * deklarasi variabel
         */
        $data = array();
        $dataBayar = array();
        $startRow = 8;
        $numRow = 1;

        /**
         * baca data per row
         */
        foreach($sheet as $row) {

            /**
             * pembacaan data dimulai pada row yang ada datanya
             * hingga row kosong
             */
            if ($numRow >= $startRow) {

                /**
                 * jika kolom A kosong maka break
                 */
                if ($row['A'] == '') {
                    break;
                }

                /**
                 * ambil data kode package
                 */
                $kode_package = $row['C']; // $spreadsheet->getActiveSheet()->getCell('C'.$row)->getValue();

                /**
                 * mendapatkan row_set dari tabel t04_package dengan syarat ::
                 *   - periode terbaru
                 *   - berdasarkan kode package
                 */
                $package_row = $this->T04_package_model->get_by_kode($kode_package);

                /**
                 * id data package
                 */
                $package = $package_row->id;
                // pre($package);

                /**
                 * data night
                 */
                $night = $row['D']; // $spreadsheet->getActiveSheet()->getCell('D'.$row)->getValue();

                /**
                 * mencari mata uang dan price berdasarkan kode package dan night
                 */
                switch ($night) {
                    case 3:
                        $mata_uang = $package_row->ln3n_mata_uang;
                        $price = $package_row->ln3n_harga;
                        break;
                    case 6:
                        $mata_uang = $package_row->ln6n_mata_uang;
                        $price = $package_row->ln6n_harga;
                        break;
                    case 1:
                        $mata_uang = $package_row->ln1n_mata_uang;
                        $price = $package_row->ln1n_harga * $night;
                        break;
                    default:
                        $mata_uang = $package_row->ln1n_mata_uang;
                        $price = $package_row->ln1n_harga * $night;
                }
                // pre($mata_uang . ' - ' . $price);

                /**
                 * ambil data check out dan dicari data check ini
                 * dengan rumus = data check out - night
                 */
                $check_out = date_ymd($row['E']); // date_ymd($spreadsheet->getActiveSheet()->getCell('E'.$row)->getValue());
                $check_in = date_format(date_add(date_create($check_out), date_interval_create_from_date_string(-$night . ' days')), 'Y-m-d');
                // pre($check_in . ' - ' . $check_out);

                /**
                 * id agent
                 */
                $agent_row = $this->T05_agent_model->get_by_nama($row['F']);

                /**
                 * jika agent tidak ada maka diisi kosong
                 * tapi diubah
                 */
                // $agent = $agent_row ? $agent_row->id : -1;
                // pre($agent);

                /**
                 * diubah, jika agent tidak ada di master tapi ada di excel
                 * maka di master ditambahkan dengan yang ada di excel
                 */
                //
                $agent = '-1';
                if ($agent_row) {
                    $agent = $agent_row->id;
                } else {
                    $data = array(
                        'nama' => strtoupper($row['F']),
                        'komisi' => 0,
                    );
                    $this->T05_agent_model->insert($data);
                    $agent = $this->db->insert_id();
                }

                /**
                 * simpan data bkm detail
                 */
                $data = array(
                    'bkm' => $bkm,
                    'name' => $row['B'],
                    'package' => $package,
                    'night' => $night,
                    'check_in' => $check_in,
                    'check_out' => $check_out,
                    'mata_uang' => $mata_uang,
                    'price' => $price,
                    'agent' => $agent,
                    'remarks' => $row['J'],
                    'price_1' => $loadexcel->getActiveSheet()->getCell('G'.$numRow)->getFormattedValue(),
                    'price_1_value' => $row['G'],
                    'fee_tanas' => $loadexcel->getActiveSheet()->getCell('H'.$numRow)->getFormattedValue(),
                    'fee_tanas_value' => $row['H'],
                    'price_2' => $loadexcel->getActiveSheet()->getCell('I'.$numRow)->getFormattedValue(),
                );
                $this->T31_bkm_detail_model->insert($data);

                $bkm_detail = $this->db->insert_id();

                /**
                 * simpan payment
                 */
                //
                $startKolomPayment = 10; // kolom terakhir di J
                $startKolomPayment = 74; // kolom terakhir di J

                // $spreadsheet->getActiveSheet()->getCellByColumnAndRow(8, 3)->getValue()
                foreach($kolom_payment as $rowData) {

                    $jumlah = 0;
                    // $notNull = false;
                    // if (!is_null($loadexcel->getActiveSheet()->getCellByColumnAndRow($startKolomPayment + $rowData->urutan, $numRow)->getValue())) {
                    if (!is_null($loadexcel->getActiveSheet()->getCell(chr($startKolomPayment + $rowData->urutan).$numRow)->getValue())) {
                        // $notNull = true;
                        // $jumlah = $loadexcel->getActiveSheet()->getCellByColumnAndRow($startKolomPayment + $rowData->urutan, $numRow)->getValue();
                        $jumlah = $loadexcel->getActiveSheet()->getCell(chr($startKolomPayment + $rowData->urutan).$numRow)->getValue();
                    }
                    // pre($startKolomPayment + $rowData->urutan . ', ' . $numRow . ' :: ' . $notNull);
                    // pre(chr($startKolomPayment + $rowData->urutan).$numRow . ' :: ' . $notNull);
                    // pre($rowData->id . ' - ' . $rowData->urutan);

                    if ($jumlah <> 0) {
                        $data = array(
                            'bkm_detail' => $bkm_detail,
                            'kolom_payment' => $rowData->id,
                            'jumlah' => $jumlah,
                        );
                        // pre($data);
                        $this->T32_bkm_detail_payment_model->insert($data);

                        // simpan di tabel pembayaran
                        $data = array(
                            'bkm_detail' => $bkm_detail,
                            'dibayar_oleh' => $bkm_detail,
                            'mata_uang' => $rowData->mata_uang,
                            'jumlah' => $jumlah,
                        );
                        $this->T33_pembayaran_model->insert($data);
                    }

                }
                // exit;

            }
            $numRow++;

        }

        $this->session->set_flashdata('message', 'Data berhasil diimport !');
        redirect(site_url('t30_bkm'));

    }

    public function read($id)
    {
        $row = $this->T30_bkm_model->get_by_id($id);
        if ($row) {
            $t31_bkm_detail_data = $this->T31_bkm_detail_model->get_all_by_bkm($id);
            $data_t31_bkm_detail = array(
                't31_bkm_detail_data' => $t31_bkm_detail_data,
            );
            $data = array(
        		'id' => $row->id,
        		'nomor' => $row->nomor,
        		'tanggal' => $row->tanggal,
        		'rate_usd' => $row->rate_usd,
        		'rate_aud' => $row->rate_aud,
                't31_bkm_detail_data' => $this->load->view('t31_bkm_detail/t31_bkm_detail_list', $data_t31_bkm_detail, true),
    	    );
            $this->load->view('t30_bkm/t30_bkm_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_bkm'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('t30_bkm/create_action'),
            'id' => set_value('id'),
            'nomor' => set_value('nomor'),
            'tanggal' => set_value('tanggal'),
            'rate_usd' => set_value('rate_usd'),
            'rate_aud' => set_value('rate_aud'),
        );
        $this->load->view('t30_bkm/t30_bkm_form', $data);
    }

    public function create_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nomor' => $this->input->post('nomor',TRUE),
                'tanggal' => $this->input->post('tanggal',TRUE),
                'rate_usd' => $this->input->post('rate_usd',TRUE),
                'rate_aud' => $this->input->post('rate_aud',TRUE),
            );
            $this->T30_bkm_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('t30_bkm'));
        }
    }

    public function update($id)
    {
        $row = $this->T30_bkm_model->get_by_id($id);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('t30_bkm/update_action'),
                'id' => set_value('id', $row->id),
                'nomor' => set_value('nomor', $row->nomor),
                'tanggal' => set_value('tanggal', $row->tanggal),
                'rate_usd' => set_value('rate_usd', $row->rate_usd),
                'rate_aud' => set_value('rate_aud', $row->rate_aud),
            );
            $this->load->view('t30_bkm/t30_bkm_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_bkm'));
        }
    }

    public function update_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nomor' => $this->input->post('nomor',TRUE),
                'tanggal' => $this->input->post('tanggal',TRUE),
                'rate_usd' => $this->input->post('rate_usd',TRUE),
                'rate_aud' => $this->input->post('rate_aud',TRUE),
            );
            $this->T30_bkm_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('t30_bkm'));
        }
    }

    public function delete($id)
    {
        $row = $this->T30_bkm_model->get_by_id($id);
        if ($row) {
            $this->T30_bkm_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('t30_bkm'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('t30_bkm'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nomor', 'nomor', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required');
        $this->form_validation->set_rules('rate_usd', 'rate usd', 'trim|required|numeric');
        $this->form_validation->set_rules('rate_aud', 'rate aud', 'trim|required|numeric');
        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file T30_bkm.php */
/* Location: ./application/controllers/T30_bkm.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2023-08-13 03:39:10 */
/* http://harviacode.com */
