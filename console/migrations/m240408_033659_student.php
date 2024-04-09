<?php

use yii\db\Migration;

/**
 * Class m240408_033659_student
 */
class m240408_033659_student extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%student}}', [
            'mhv' => $this->string(9)->notNull(),
            'ho_ten' => $this->string(50)->notNull(),
            'ngay_sinh' => $this->date()->notNull(),
            'ho_chieu' => $this->string(8)->unique(),
            'cccd' => $this->integer(12)->notNull()->unique(),
            'sdt' => $this->integer()->notNull()->unique(),

            'ho_khau' => $this->string()->notNull()->unique(),
            'dia_chi_tt' => $this->string()->notNull(),
            'ng_bao_lanh' => $this->string(),
            'ngay_thi_tuyen' => $this->date(),
            'ngay_nhap_hoc' => $this->date()->notNull(),
            'ngay_dukien_XC'=> $this->date(),
            'ngay_dukien_VN'=> $this->date(),
            'ngay_XC'=> $this->string(),
            'nganh_nghe'=> $this->string(),
            'xi_nghiep_tiepnhan'=> $this->string(),
            'nghiep_doan'=> $this->string(),
            'noi_lam_viec'=> $this->string(),
            'trang_thai'=> $this->string(),
            'ghi_chu'=> $this->string(),
            'anh_hv'=> $this->string()->notNull()->unique(),
            'lich_su_XKLD'=> $this->string(),

        ], $tableOptions);
        $this->execute('ALTER TABLE {{%student}} ADD PRIMARY KEY (mhv)');
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        echo "m240408_033659_student cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240408_033659_student cannot be reverted.\n";

        return false;
    }
    */
}
