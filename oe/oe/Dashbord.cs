using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace oe
{
    public partial class Dashbord : UserControl
    {
        public Dashbord()
        {
            InitializeComponent();
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }

        private void Dashbord_Load(object sender, EventArgs e)
        {
            MySqlConnection conn = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none;");
            MySqlConnection conn2 = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none;");
            MySqlConnection conn3 = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none;");
            MySqlConnection conn4 = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none;");



            try
            { 
                conn.Open();
                conn2.Open();
                conn3.Open();
                conn4.Open();

                MySqlCommand cmd_users = new MySqlCommand("SELECT COUNT(id)FROM users", conn);
              

                MySqlCommand cmd_errors = new MySqlCommand("SELECT COUNT(id)FROM errors", conn2);
               
                MySqlCommand cmd_reports = new MySqlCommand("SELECT COUNT(id)FROM reports", conn3);
               
                MySqlCommand cmd_not_active = new MySqlCommand("SELECT COUNT(id)FROM users WHERE active = 0", conn4);

                MySqlDataReader reader = cmd_users.ExecuteReader();
               
                MySqlDataReader reader_errors = cmd_errors.ExecuteReader();
              ;
                MySqlDataReader reader_reports = cmd_reports.ExecuteReader();
               
                MySqlDataReader reader_not_active = cmd_not_active.ExecuteReader();


                if (reader.HasRows)
                {
                    while (reader.Read())
                    {
                        totalusers.Text = reader["COUNT(id)"].ToString();
                        anlysusers.Height = Int32.Parse(reader["COUNT(id)"].ToString());

                    }
                    while (reader_errors.Read())
                    {
                        totalerrors.Text = reader_errors["COUNT(id)"].ToString();
                        anlyserrors.Height = Int32.Parse(reader_errors["COUNT(id)"].ToString());


                    }
                    while (reader_reports.Read())
                    {
                        totalreports.Text = reader_reports["COUNT(id)"].ToString();
                        anlysreport.Height = Int32.Parse(reader_reports["COUNT(id)"].ToString());

                    }
                    while (reader_not_active.Read())
                    {
                      totalnotactive.Text = reader_not_active["COUNT(id)"].ToString();
                      anlynoactive.Height = Int32.Parse(reader_not_active["COUNT(id)"].ToString());

                    }


                }
            }catch(Exception ex) { MessageBox.Show(ex.ToString()); }
    }   }
}
