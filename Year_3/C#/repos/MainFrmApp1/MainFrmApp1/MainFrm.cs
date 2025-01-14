namespace MainFrmApp1
{
    public partial class MainForm : Form
    {
        public MainForm()
        {
            InitializeComponent();
        }

        private void closeFrmAll()
        {
            foreach (Form childForm in this.MdiChildren)
            {
                childForm.Close();
            }
        }

        private bool isForm1Open = false;
        private bool isForm2Open = false;

        private void openForm1ToolStripMenuItem_Click(object sender, EventArgs e)
        {
            closeFrmAll();
            if (!isForm1Open)
            {
                Form1 frm1 = new Form1();
                //frm1.MdiParent = this;
                frm1.Show();
                isForm1Open = true;

                frm1.FormClosed += (s, args) => isForm1Open = false;
            }
            else
            {
                MessageBox.Show("Form1 is already open.");
            }
        }

        private void openForm2ToolStripMenuItem_Click(object sender, EventArgs e)
        {
            closeFrmAll();
            if (!isForm2Open)
            {
                Form2 frm2 = new Form2();
                frm2.MdiParent = this;
                frm2.Show();
                isForm2Open = true;

                frm2.FormClosed += (s, args) => isForm2Open = false;
            }
            else
            {
                MessageBox.Show("Form2 is already open.");
            }
        }
    }
}
