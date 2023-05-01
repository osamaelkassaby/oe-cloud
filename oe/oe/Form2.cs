using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Diagnostics;
using System.Drawing;
using System.Globalization;
using System.Linq;
using System.Text;
using System.IO;
using System.IO.Ports;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Xml.Linq;
using MySql.Data.MySqlClient;
using static System.Windows.Forms.VisualStyles.VisualStyleElement.ListView;
using static System.Windows.Forms.VisualStyles.VisualStyleElement;
using System.Threading;
using Org.BouncyCastle.Crypto.Tls;

namespace oe
{
    
    public partial class Login : Form
    {
        public static string nfc;
        public static string firstname;
        public static string lastname;
        public static  string email;
        public static string password;
        public static string username;
        public static string token;
        public static string userid;
        public static string root;
        public static string permission;
        public static string active;
        public static string img;


        public Login()
        {
            InitializeComponent();
        }
        private void button1_Click(object sender, EventArgs e)
        {
            MySqlConnection conn = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none;");
           


            try
            {
                conn.Open();
                string pass = password_input.Text.Trim();
                string user = username_input.Text.Trim();
                //string pass = password_input.ToString();
                //string user = username_input.ToString();
                MySqlCommand cmd = new MySqlCommand("SELECT * FROM `users_admin` WHERE email = @email  AND password = @password", conn);
                cmd.Parameters.AddWithValue("@email",user);
                cmd.Parameters.AddWithValue("@password", pass);
                MySqlDataReader reader = cmd.ExecuteReader();
                if (reader.HasRows) {
                  

                    while (reader.Read())
                    {
                        email = reader["email"].ToString();
                        password = reader["password"].ToString();
                        if (email == user & password == pass)
                        {

                            username = reader["username"].ToString();
                            token = reader["token"].ToString();
                            userid = reader["user_id"].ToString();
                            root = reader["root"].ToString();
                            active = reader["active"].ToString();
                            permission = reader["permission"].ToString();
                            firstname = reader["firstname"].ToString();
                            lastname = reader["lastname"].ToString();
                            img = reader["img_src"].ToString();
                            if (permission == "True" && active == "True")
                            {
                                Form form = new profile();
                                Login login = new Login();
                                login.Hide();
                                form.ShowDialog();

                            }

                        }
                        else { MessageBox.Show("Email or Password is Faild"); }
                    }
                }
                else { MessageBox.Show("Email or Password is Faild");conn.Close(); }

            }
            catch(Exception ex)
            {
                MessageBox.Show("Email NOT FOUND"+ex);
            }


            

        }

        public void process(string root , string active , string permation)
        {
            int r = Int32.Parse(root , NumberStyles.AllowExponent);
            int a = Int32.Parse(active , NumberStyles.AllowExponent);
            int b = Int32.Parse(permation , NumberStyles.AllowExponent);
            if ( r== 1 & a== 1 & b == 1) {
                MessageBox.Show("done");
            }
        }

        private void Login_Load(object sender, EventArgs e)
        {
            try
            {
                serialPort1.PortName = "COM7";
                serialPort1.BaudRate = Convert.ToInt32("9600");
                serialPort1.Open();
            }
            catch(Exception ex)
            {
                MessageBox.Show("Error 2 126 : "+ ex.ToString());
            }
          
        }

        private void serialPort1_DataReceived(object sender, SerialDataReceivedEventArgs e)
        {
            MessageBox.Show("Scanning ....");
            nfc += serialPort1.ReadExisting().ToString();
            Thread.Sleep(1000);
            Console.WriteLine(nfc);
            conn_nfc();
            nfc = "";

        }

        public void conn_nfc()
        {
            MySqlConnection conn = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none;");

            try
            {
                conn.Open();
                //string pass = password_input.Text.Trim();
                //string user = username_input.Text.Trim();
                string pass = "Osama@oe.com#difine2244";
                string user = "osama@oe.com";
                MySqlCommand cmd = new MySqlCommand("SELECT * FROM `users_admin` WHERE nfc = @nfc", conn);
                cmd.Parameters.AddWithValue("@nfc",nfc);
                Console.WriteLine(nfc);
                MessageBox.Show(nfc);
                MySqlDataReader reader = cmd.ExecuteReader();
                if (reader.HasRows)
                {


                    while (reader.Read())
                    {
                        email = reader["email"].ToString();
                        password = reader["password"].ToString();
                       

                            username = reader["username"].ToString();
                            token = reader["token"].ToString();
                            userid = reader["user_id"].ToString();
                            root = reader["root"].ToString();
                            active = reader["active"].ToString();
                            permission = reader["permission"].ToString();
                            firstname = reader["firstname"].ToString();
                            lastname = reader["lastname"].ToString();
                             img = reader["img_src"].ToString();

                        if (permission == "True" && active == "True")
                            {
                            Form form = new profile();
                            Login login = new Login();
                            login.Close();
                            form.ShowDialog();
                            }

                       
                    }
                }
                else { MessageBox.Show("Email or Password is Faild"); conn.Close(); }

            }
            catch (Exception ex)
            {
                MessageBox.Show("Email NOT FOUND" + ex);
            }
        }
    }
}
