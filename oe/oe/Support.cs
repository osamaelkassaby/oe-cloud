using iTextSharp.text.pdf;
using iTextSharp.text;
using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace oe
{
    public partial class Support : UserControl
    {
        public Support()
        {
            InitializeComponent();
        }
        public static string username_;
        public static string userid;

        private void Support_Load(object sender, EventArgs e)
        {
            MySqlConnection conn = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none;");
            conn.Open();
            MySqlCommand cmd = new MySqlCommand("SELECT * FROM `reports`", conn);
            MySqlDataReader reader = cmd.ExecuteReader();

            if (reader.HasRows)
            {
                while (reader.Read())
                {
                    dataGridView1.Rows.Add(reader["id"].ToString(), reader["report_id"].ToString(), reader["username"].ToString(), reader["user_id"].ToString(), reader["report_type"].ToString(), reader["report_descripton"].ToString() , reader["report_status"].ToString() , reader["contact"].ToString() , reader["time"].ToString());
                }
            }
        }

        private void dataGridView1_SelectionChanged(object sender, EventArgs e)
        {
            report_type_inp.Text = dataGridView1.CurrentRow.Cells["report_type"].Value.ToString();
            report_status_inp.Text = dataGridView1.CurrentRow.Cells["report_status"].Value.ToString();
            contact_inp.Text = dataGridView1.CurrentRow.Cells["contact"].Value.ToString();
            username_ = dataGridView1.CurrentRow.Cells["username"].Value.ToString();
        }

        private void update_Click(object sender, EventArgs e)
        {
            string report_type = report_type_inp.Text;
            string report_status = report_status_inp.Text;
            string contact = contact_inp.Text;

            MySqlConnection conn = new MySqlConnection("server=localhost;database=oe;UID=root;password=;SslMode=none;");
            conn.Open();
            MySqlCommand cmd = new MySqlCommand("UPDATE `reports` SET `report_type` = @report_type , `report_status` = @report_status , `contact` = @contact WHERE username = @username", conn);

            cmd.Parameters.AddWithValue("@report_type", report_type);
            cmd.Parameters.AddWithValue("@report_status", report_status);
            cmd.Parameters.AddWithValue("@contact", contact);
            cmd.Parameters.AddWithValue("@username",username_ );

            cmd.ExecuteNonQuery();

        }

        private void exepert_Click(object sender, EventArgs e)
        {

            if (dataGridView1.Rows.Count > 0)
            {
                SaveFileDialog save = new SaveFileDialog();
                save.Filter = "PDF (*.pdf)|*.pdf";
                save.FileName = "Result.pdf";
                bool ErrorMessage = false;
                if (save.ShowDialog() == DialogResult.OK)
                {
                    if (File.Exists(save.FileName))
                    {
                        try
                        {
                            File.Delete(save.FileName);
                        }
                        catch (Exception ex)
                        {

                            ErrorMessage = true;
                            MessageBox.Show("Unable to wride data in disk" + ex.Message);
                        }
                    }
                    if (!ErrorMessage)
                    {
                        try
                        {
                            PdfPTable pTable = new PdfPTable(dataGridView1.Columns.Count);
                            pTable.DefaultCell.Padding = 2;
                            pTable.WidthPercentage = 200;
                            pTable.HorizontalAlignment = Element.ALIGN_LEFT;

                            foreach (DataGridViewColumn col in dataGridView1.Columns)
                            {
                                PdfPCell pCell = new PdfPCell(new Phrase(col.HeaderText));
                                pTable.AddCell(pCell);
                                Console.WriteLine(col);

                            }
                            foreach (DataGridViewRow viewRow in dataGridView1.Rows)
                            {
                                foreach (DataGridViewCell dcell in viewRow.Cells)
                                {

                                    pTable.AddCell(dcell.Value.ToString());
                                    Console.WriteLine(dcell.Value.ToString());
                                }
                            }


                            using (FileStream fileStream = new FileStream(save.FileName, FileMode.Create))
                            {
                                Document document = new Document(PageSize.A4, 8f , 8f, 8f, 8f);
                                PdfWriter.GetInstance(document, fileStream);
                                document.Open();
                                document.Add(pTable);
                                document.Close();
                                fileStream.Close();
                            }
                            MessageBox.Show("Data Export Successfully", "info");

                        }

                        catch (Exception ex)
                        {

                            MessageBox.Show("Error while exporting Data" + ex.Message);
                        }
                    }
                }
            }
            else
            {
                MessageBox.Show("No Record Found", "Info");

            }
        }
    }
}
