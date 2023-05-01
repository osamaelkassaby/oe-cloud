using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Net;
using System.Reflection;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using Ubiety.Dns.Core;
using static System.Windows.Forms.VisualStyles.VisualStyleElement.ListView;

namespace oe
{
    public partial class profile : Form
    {
        public profile()
        {
            InitializeComponent();
        }


        private void profile_Load(object sender, EventArgs e)
        {
            Dashbord dashbord = new Dashbord();
            dashbord.Dock = DockStyle.Fill;
            panal.Controls.Add(dashbord);
            try
            {
                var req = WebRequest.Create(Login.img);
                var res = req.GetResponse();
                var stream = res.GetResponseStream();
                pictureBox1.BackgroundImage = Bitmap.FromStream(stream);
            }
            catch(Exception ex) { }
            label1.Text = "welcome M.R " + Login.lastname;
            lbluser.Text = Login.username;
            MySqlConnection conn = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none;");
            conn.Open();
            MySqlCommand cmd = new MySqlCommand("SELECT * FROM `errors`", conn);
            try
            {
                MySqlDataReader reader = cmd.ExecuteReader();

                if (reader.HasRows)
            {


                while (reader.Read())
                {
                }
            }
            }catch(Exception ex)
            {
                MessageBox.Show("Error");
            }
          
        }

        private void button1_Click(object sender, EventArgs e)
        {
            panal.Controls.Clear();
            Dashbord dashbord = new Dashbord();
            dashbord.Dock = DockStyle.Fill;
            panal.Controls.Add(dashbord);
        }

        private void Errors_btn_Click(object sender, EventArgs e)
        {

        }

        private void reports_btn_Click(object sender, EventArgs e)
        {
            
            panal.Controls.Clear();
            Support support = new Support();
            support.Dock = DockStyle.Fill;
         
            panal.Controls.Add(support);

        }

        private void users_btn_Click(object sender, EventArgs e)
        {
            panal.Controls.Clear();
            Users users = new Users();
            users.Dock = DockStyle.Fill;
            panal.Controls.Add(users);
        }
    }
}
