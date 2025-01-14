using System.Windows.Forms;

namespace MyAppTools2
{
    public partial class MyAppTools : Form
    {
        List<List<string>> matrixName = new List<List<string>>()
        {
            new List<string> { "นาย", "นิติธร", "นันทสินธ์", "โด่ง", "20" }
        };

        public MyAppTools()
        {
            InitializeComponent();
        }

        private void cmbTitleName_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void MyAppTools_Load(object sender, EventArgs e)
        {
            cmbTitleName.Items.Add("Mr.");
            cmbTitleName.Items.Add("Ms.");
            foreach (var row in matrixName)
            {
                lstListNameFullDetail.Items.Add(string.Join(" | ", row));
            }
        }

        private void btnShow_Click(object sender, EventArgs e)
        {
            if (!(cmbTitleName.SelectedIndex == -1 || txtName.Text == "" || txtLastName.Text == "" || txtNickName.Text == "" || txtAge.Text == ""))
            {
                string tmpName = ($"{cmbTitleName.Text} {txtName.Text} {txtLastName.Text} ชื่อเล่น {txtNickName.Text} อายุ {txtAge.Text}");
                matrixName.Add(new List<string> {$"{cmbTitleName.Text}", $"{txtName.Text}", $"{txtLastName.Text}", $"{txtNickName.Text}", $"{txtAge.Text}" });
                lblShowName.Text = "บันทึกข้อมูลของ " + tmpName + " สำเร็จ";
                //lstListNameFullDetail.Items.Add(tmpName);
                txtName.Clear();
                txtLastName.Clear();
                txtNickName.Clear();
                txtAge.Clear();
                
                int selectedIndex = lstListNameFullDetail.SelectedIndex;
                MessageBox.Show(selectedIndex.ToString());
                if (selectedIndex != -1)
                {
                    matrixName[selectedIndex][0] = cmbTitleName.Text;
                    matrixName[selectedIndex][1] = txtName.Text;
                    matrixName[selectedIndex][2] = txtLastName.Text;
                    matrixName[selectedIndex][3] = txtNickName.Text;
                    matrixName[selectedIndex][4] = txtAge.Text;
                    lstListNameFullDetail.Items.Clear();
                    foreach (var row in matrixName)
                    {
                        lstListNameFullDetail.Items.Add(string.Join(" ", row));
                    }
                }
                else
                {
                    lstListNameFullDetail.Items.Clear();
                    foreach (var row in matrixName)
                    {
                        lstListNameFullDetail.Items.Add(string.Join(" ", row));
                    }
                }

            }
            else
            {
                lblShowName.Text = "กรุณากรอกข้อมูลให้ครบ";
            }

        }

        private void lstListNameFullDetail_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (lstListNameFullDetail.SelectedIndex != -1)
            {
                int selectedIndex = lstListNameFullDetail.SelectedIndex;
                if (selectedIndex < matrixName.Count)
                {
                    cmbTitleName.Text = string.Join(", ", matrixName[selectedIndex][0]);
                    txtName.Text = string.Join(", ", matrixName[selectedIndex][1]);
                    txtLastName.Text = string.Join(", ", matrixName[selectedIndex][2]);
                    txtNickName.Text = string.Join(", ", matrixName[selectedIndex][3]);
                    txtAge.Text = string.Join(", ", matrixName[selectedIndex][4]);
                }
            }
        }

        private void txtSelectedLst_TextChanged(object sender, EventArgs e)
        {
            //if(lstListNameFullDetail.SelectedIndex != -1)
            //{
            //    //MessageBox.Show(lstListNameFullDetail.SelectedIndex.ToString());
            //    lstListNameFullDetail.Items[lstListNameFullDetail.SelectedIndex] = txtSelectedLst.Text.ToString();
            //}
        }
    }
}
