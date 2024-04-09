<?php

use yii\db\Migration;

/**
 * Class m240408_041822_enterprise
 */
class m240408_041822_enterprise extends Migration
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

        $this->createTable('{{%enterprise}}', [
            'mdn' => $this->string(20)->notNull()->unique(),
            'xi_nghiep' => $this->string(20)->notNull(),
            'ten_giam_doc' =>$this-> string(50)->notNull(),
            'nganh_nghe' => $this->string(20)->notNull(),
            'nghiep_doan' => $this->string(20)->notNull(),
            'sdt_xn'=> $this->string(11)->notNull(),
            'dia_chi_xn'=> $this->string()->notNull(),
            'noi_lam_viec' => $this->string(),
            'so_luong_don_hang'=>$this->integer(),
            'so_luong_hv'=>$this->integer(),
            'ghi_chu'=> $this->string(),
            
        ], $tableOptions);
        $this->execute('ALTER TABLE {{%enterprise}} ADD PRIMARY KEY (mdn)');
    }
    /**
     * mot so cau lenh form column
     * select concat(substring(xi_nghiep,1,3),substring(ten_giam_doc,1,3)) as mdn from enterprise // hoac de cus tu dien
     * select count(mdh) as 'so luong don hang' from order group by mdn // dem so don hang cua doanh nghiep
     * select count(mhv) as 'so luong hoc vien' from student group by mdn // dem so hoc vien cua doanh nghiep
     */

    /**
     * {@inheritdoc}
     */
    public function down()
    {
        $this->dropTable('{{%enterprise}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240408_041822_enterprise cannot be reverted.\n";

        return false;
    }
    */
}
