<?php

use yii\db\Migration;

/**
 * Class m240408_040547_order
 */
class m240408_040547_order extends Migration
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

        $this->createTable('{{%order}}', [
            'mdh' => $this->string(7)->primaryKey(),
            'ten_dh' => $this->string(20)->notNull(),
            'nghiep_doan' => $this->string(20)->notNull(),
            'xi_nghiep' => $this->string(20)->notNull(),
            'nganh_nghe' => $this->string(20)->notNull(),
            'ngay_dktt' => $this->date(),
            'ngay_pv' => $this->date(),
            'hinh_thuc_tt' => $this->string(),
            'ngay_dukien_XC'=> $this->date(),
            'ngay_dukien_VN'=> $this->date(),
            'slg_tuyen'=>$this->string(50),
            'yeu_cau' => $this->string(100),
            'noi lam viec' => $this->string(),
            'muc_luong' => $this->integer(),
            'che_do_phu_cap'=> $this->string(),
            'thoi_gian_lam_viec'=> $this->string(),
            'trang_thai'=> $this->string(),

        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%order}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240408_040547_order cannot be reverted.\n";

        return false;
    }
    */
}
