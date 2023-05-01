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
    public partial class Reports : UserControl
    {
        public Reports()
        {
            InitializeComponent();
        }

        private void reports_Load(object sender, EventArgs e)
        {
            MySqlConnection conn = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none;");
            conn.Open();
            MySqlCommand cmd = new MySqlCommand("SELECT * FROM `reports`", conn);
            MySqlDataReader reader = cmd.ExecuteReader();

            if (reader.HasRows)
            {
                while (reader.Read())
                {

                    dataGridView1.Rows.Add(reader["id"].ToString() , reader["report_id"].ToString(), reader["username"].ToString(), reader["user_id"].ToString(), reader["report_type"].ToString() , reader["report_descripton"].ToString());
                }
            }
        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {
        }

        private void dataGridView1_SelectionChanged(object sender, EventArgs e)
        {
            report_id_input.Text = dataGridView1.CurrentRow.Cells["report_id"].Value.ToString();

        }
    }
}
