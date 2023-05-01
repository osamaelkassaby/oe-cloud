using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO.Ports;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using static System.Windows.Forms.VisualStyles.VisualStyleElement.ToolTip;
using static System.Windows.Forms.VisualStyles.VisualStyleElement;
using MySql.Data.MySqlClient;
namespace oe
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            panel1.Width += 2;
            if(panel1.Width >= 400)
            {
                MySqlConnection conn = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none");

                try
                {
                    conn.Open();

                }catch(Exception ex)
                {
                    MessageBox.Show("Connection Falid");
                    this.Close();
                }
            }if(panel1.Width >= 800)
            {
                Login login = new Login();
                this.Hide();
                timer1.Stop();

                login.ShowDialog();
            }
        }

        
    }
}
