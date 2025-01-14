namespace WinAppName
{
    public partial class FormHome : Form
    {
        public FormHome()
        {
            InitializeComponent();
        }

        private void btnShow_Click(object sender, EventArgs e)
        {
            label1.Text = "สวัสดีท่าน " + TxtName.Text + " " + TxtLastname.Text;
        }

        private void FormHome_Load(object sender, EventArgs e)
        {
            TxtName.PlaceholderText = "กรุณากรอกชื่อ";
            TxtLastname.PlaceholderText = "กรุณากรอกนามสกุล";
        }
    }
}
