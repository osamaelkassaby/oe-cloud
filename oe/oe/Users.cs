using iTextSharp.text;
using iTextSharp.text.pdf;
using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Drawing.Printing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Xml.Linq;

namespace oe
{
    public partial class Users : UserControl
    {
        public Users()
        {
            InitializeComponent();
        }

        public string id_;

        private void Users_Load(object sender, EventArgs e)
        {



            MySqlConnection conn = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none;");
            conn.Open();
            MySqlCommand cmd = new MySqlCommand("SELECT * FROM `users`", conn);
            MySqlDataReader reader = cmd.ExecuteReader();

            if (reader.HasRows)
            {
                while (reader.Read())
                {
                    dataGridView1.Rows.Add(reader["id"].ToString(), reader["sec_id"].ToString(), reader["firstname"].ToString(), reader["lastname"].ToString(), reader["username"].ToString(), reader["email"].ToString(), reader["country"].ToString(), reader["active"].ToString(), reader["phone"].ToString() , reader["day"].ToString() , reader["month"].ToString() , reader["year"].ToString() , reader["user_id"].ToString() , reader["sec_code"].ToString() , reader["ip"].ToString());
                }
            }
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
            sec_id_inp.Text = dataGridView1.CurrentRow.Cells["sec_id"].Value.ToString();
            fname_inp.Text = dataGridView1.CurrentRow.Cells["firstname"].Value.ToString();
            lname_inp.Text = dataGridView1.CurrentRow.Cells["lastname"].Value.ToString();
            username_inp.Text = dataGridView1.CurrentRow.Cells["username"].Value.ToString();
            email_inp.Text = dataGridView1.CurrentRow.Cells["email"].Value.ToString();
            country_inp.Text = dataGridView1.CurrentRow.Cells["country"].Value.ToString();
            phone_inp.Text = dataGridView1.CurrentRow.Cells["phone"].Value.ToString();
            user_id_inp.Text = dataGridView1.CurrentRow.Cells["user_id"].Value.ToString();
            active_inp.Text = dataGridView1.CurrentRow.Cells["active"].Value.ToString();
        }

        private void dataGridView1_SelectionChanged(object sender, EventArgs e)
        {
            sec_id_inp.Text = dataGridView1.CurrentRow.Cells["sec_id"].Value.ToString();
            fname_inp.Text = dataGridView1.CurrentRow.Cells["firstname"].Value.ToString();
            lname_inp.Text = dataGridView1.CurrentRow.Cells["lastname"].Value.ToString();
            username_inp.Text = dataGridView1.CurrentRow.Cells["username"].Value.ToString();
            email_inp.Text = dataGridView1.CurrentRow.Cells["email"].Value.ToString();
            country_inp.Text = dataGridView1.CurrentRow.Cells["country"].Value.ToString();
            phone_inp.Text = dataGridView1.CurrentRow.Cells["phone"].Value.ToString();
            user_id_inp.Text = dataGridView1.CurrentRow.Cells["user_id"].Value.ToString();
            active_inp.Text = dataGridView1.CurrentRow.Cells["active"].Value.ToString();
            lbl_ip.Text = dataGridView1.CurrentRow.Cells["ip"].Value.ToString();
            lbl_id.Text = dataGridView1.CurrentRow.Cells["id"].Value.ToString();
            id_ = dataGridView1.CurrentRow.Cells["id"].Value.ToString();
        }

        private void update_Click(object sender, EventArgs e)
        {

            MySqlConnection conn = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none;");
            conn.Open();
            MySqlCommand cmd = new MySqlCommand("UPDATE `users` SET `sec_id` = @sec_id , `firstname` = @firstname , `username` = @username , `email` = @email , `country` = @country , `phone` = @phone , `user_id` = @user_id , `active` = @active  WHERE id = @id", conn);

            cmd.Parameters.AddWithValue("@sec_id", sec_id_inp.Text);
            cmd.Parameters.AddWithValue("@firstname", fname_inp.Text);
            cmd.Parameters.AddWithValue("@lastname", lname_inp.Text);
            cmd.Parameters.AddWithValue("@username", username_inp.Text);
            cmd.Parameters.AddWithValue("@email", email_inp.Text);
            cmd.Parameters.AddWithValue("@country", country_inp.Text);
            cmd.Parameters.AddWithValue("@phone", phone_inp.Text);
            cmd.Parameters.AddWithValue("@user_id", user_id_inp.Text);
            cmd.Parameters.AddWithValue("@active", active_inp.Text);
            cmd.Parameters.AddWithValue("@id",id_);

            cmd.ExecuteNonQuery();
        }

        private void delete_Click(object sender, EventArgs e)
        {

            MySqlConnection conn = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none;");
            conn.Open();
            MySqlCommand cmd = new MySqlCommand("DELETE FROM `users` WHERE id = @id AND user_id = @user_id ", conn);
            cmd.Parameters.AddWithValue("@id", lbl_id.Text);
            cmd.Parameters.AddWithValue("@user_id", user_id_inp.Text);
            cmd.ExecuteNonQuery();

        }

        private void exepert_Click(object sender, EventArgs e)
        {
        }

        private void exepert_Click_1(object sender, EventArgs e)
        {

        }
    }
}
