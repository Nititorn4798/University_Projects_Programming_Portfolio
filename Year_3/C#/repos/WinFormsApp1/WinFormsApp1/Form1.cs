using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace WinFormsApp1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void BtnOK_Click(object sender, EventArgs e)
        {
            //MessageBox.Show("Hello World From Thailand\nBy Nititorn Nantasin 65003263019");

            label1.Text = TxtMessage.Text + TxtMessage2.Text;
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            TxtMessage.PlaceholderText = "Input Text";
            TxtMessage2.PlaceholderText = "Input Text";
        }
    }
}
