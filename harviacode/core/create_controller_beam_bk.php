<?php
$string = "<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class " . $c . " extends Admin_Controller
{
    protected \$breadrumb    = '<li><a href=\"#\"><i class=\"fa fa-dashboard\"></i> Home</a></li>
        <li class=\"active\">$c</li>';
    protected \$page_title   = '$c';
    protected \$page_url     = '';
    protected \$api_url      = '';

    protected \$".$c_url."_form = array(";
foreach ($all as $row) {
    $string .= "\n\t\t'" . $row['column_name'] . "' => \$row->" . $row['column_name'] . ",";
    $string .= "\n\t\t'". $row['column_name'] . "' => array(
            'label' => '". ucword($row['column_name']) . "',
            'rules' => 'trim|required',
            'helper' => 'form_inputlabel'
        ),";
}
$string .= "\n\t    );

    function __construct()
    {
        parent::__construct();

        if (\$this->input->post('cancel-button'))
            redirect ('".$c_url."/index');

        \$this->page_url = site_url('".$c_url."');
        \$this->api_url  = site_url('api/".$c_url."');

        \$data['page_url']   = \$this->page_url;
        \$data['api_url']    = \$this->api_url;

        \$this->load->vars(\$data);
        \$this->load->model('".$m."');

        \$this->load->library('form_validation');";

if ($jenis_tabel <> 'reguler_table') {
    $string .= "        \n\t\$this->load->library('datatables');";
}

$string .= "
    }";

if ($jenis_tabel == 'reguler_table') {

$string .= "\n\n    public function index()
    {
        \$q = urldecode(\$this->input->get('q', TRUE));
        \$start = intval(\$this->input->get('start'));

        if (\$q <> '') {
            \$config['base_url'] = base_url() . '$c_url/index.html?q=' . urlencode(\$q);
            \$config['first_url'] = base_url() . '$c_url/index.html?q=' . urlencode(\$q);
        } else {
            \$config['base_url'] = base_url() . '$c_url/index.html';
            \$config['first_url'] = base_url() . '$c_url/index.html';
        }

        \$config['per_page'] = 10;
        \$config['page_query_string'] = TRUE;
        \$config['total_rows'] = \$this->" . $m . "->total_rows(\$q);
        \$$c_url = \$this->" . $m . "->get_limit_data(\$config['per_page'], \$start, \$q);

        \$this->load->library('pagination');
        \$this->pagination->initialize(\$config);

        \$data = array(
            '" . $c_url . "_data' => \$$c_url,
            'q' => \$q,
            'pagination' => \$this->pagination->create_links(),
            'total_rows' => \$config['total_rows'],
            'start' => \$start,
        );
        \$this->load->view('$c_url/$v_list', \$data);
    }";

} else {

$string .="\n\n    public function index()
    {
        \$this->data['table_id']     = 'table_".$c_url."';
        \$this->data['panel_title']  = '".$c." List';
        \$this->template->build('".$c_url."/".$v_list."',\$this->data);
    }";
}

$string .= "\n\n    public function view(\$id){
        \$this->load->library('table');

        \$data = \$this->".$m."->get_by_id(\$id);

        \$tmpl = array ( 'table_open'  => '<table class="table table-striped">');
        \$this->table->set_template(\$tmpl);";

foreach ($all as $row) {
    $string .= "\n\t\t\$this->table->add_row('".$row['column_name']."', ': '.\$data->".$row['column_name'].");";
}
$string .= "\n

        echo \$this->table->generate();
    }";

$string .= "\n\n    function edit(\$id)
    {
        \$this->_updatedata(\$id);
    }

    function add()
    {
        \$this->_updatedata();
    }";


$string .= "\n\n    function _updatedata(\$id = 0)
    {
        \$this->load->library('form_validation');
        \$".$c_url."_form = \$this->".$c_url."_form;

        \$this->form_validation->init(\$".$c_url."_form);

        // Set default value for update data
        if (\$id > 0)
            \$this->form_validation->set_default(\$this->".$m."->get_by_id(\$id));

        if (\$this->form_validation->run())
        {
            if (\$id > 0)
            {
                \$this->".$m."->update(\$id, \$this->form_validation->get_values());
                \$this->template->set_flashdata('info', '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil diubah</div>');
            }
            else
            {
                \$this->".$m."->insert(\$this->form_validation->get_values());
                \$this->template->set_flashdata('info', '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil disimpan</div>');
            }

            if (isset(\$this->data['redirect']))
                redirect(\$this->data['redirect']);
            else
                redirect('".$c_url."');
        }

        \$this->data['form'] = \$this->form_validation;
        \$this->template->build('".$c_url."/".$c_url."_form', \$this->data);
    }";

$string .= "\n\n    public function delete(\$id)
    {
        \$row = \$this->".$m."->get_by_id(\$id);

        if (\$row) {
            \$this->".$m."->delete(\$id);
            \$this->template->set_flashdata('info', '<div class="alert alert-info"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus</div>');
            redirect('person');
        } else {
            \$this->template->set_flashdata('info', '<div class="alert alert-warning"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan</div>');
            redirect('person');
        }
    }";

if ($export_excel == '1') {
    $string .= "\n\n    public function excel()
    {
        \$this->load->helper('exportexcel');
        \$namaFile = \"$table_name.xls\";
        \$judul = \"$table_name\";
        \$tablehead = 0;
        \$tablebody = 1;
        \$nourut = 1;
        //penulisan header
        header(\"Pragma: public\");
        header(\"Expires: 0\");
        header(\"Cache-Control: must-revalidate, post-check=0,pre-check=0\");
        header(\"Content-Type: application/force-download\");
        header(\"Content-Type: application/octet-stream\");
        header(\"Content-Type: application/download\");
        header(\"Content-Disposition: attachment;filename=\" . \$namaFile . \"\");
        header(\"Content-Transfer-Encoding: binary \");

        xlsBOF();

        \$kolomhead = 0;
        xlsWriteLabel(\$tablehead, \$kolomhead++, \"No\");";
foreach ($non_pk as $row) {
        $column_name = label($row['column_name']);
        $string .= "\n\txlsWriteLabel(\$tablehead, \$kolomhead++, \"$column_name\");";
}
$string .= "\n\n\tforeach (\$this->" . $m . "->get_all() as \$data) {
            \$kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber(\$tablebody, \$kolombody++, \$nourut);";
foreach ($non_pk as $row) {
        $column_name = $row['column_name'];
        $xlsWrite = $row['data_type'] == 'int' || $row['data_type'] == 'double' || $row['data_type'] == 'decimal' ? 'xlsWriteNumber' : 'xlsWriteLabel';
        $string .= "\n\t    " . $xlsWrite . "(\$tablebody, \$kolombody++, \$data->$column_name);";
}
$string .= "\n\n\t    \$tablebody++;
            \$nourut++;
        }

        xlsEOF();
        exit();
    }";
}

if ($export_word == '1') {
    $string .= "\n\n    public function word()
    {
        header(\"Content-type: application/vnd.ms-word\");
        header(\"Content-Disposition: attachment;Filename=$table_name.doc\");

        \$data = array(
            '" . $table_name . "_data' => \$this->" . $m . "->get_all(),
            'start' => 0
        );

        \$this->load->view('" . $c_url ."/". $v_doc . "',\$data);
    }";
}

if ($export_pdf == '1') {
    $string .= "\n\n    function pdf()
    {
        \$data = array(
            '" . $table_name . "_data' => \$this->" . $m . "->get_all(),
            'start' => 0
        );

        ini_set('memory_limit', '32M');
        \$html = \$this->load->view('" . $c_url ."/". $v_pdf . "', \$data, true);
        \$this->load->library('pdf');
        \$pdf = \$this->pdf->load();
        \$pdf->WriteHTML(\$html);
        \$pdf->Output('" . $table_name . ".pdf', 'D');
    }";
}

$string .= "\n\n}\n\n/* End of file $c_file */
/* Location: ./application/controllers/$c_file */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator ".date('Y-m-d H:i:s')." */
/* http://harviacode.com */";




$hasil_controller = createFile($string, $target . "controllers/" . $c_file);

?>
