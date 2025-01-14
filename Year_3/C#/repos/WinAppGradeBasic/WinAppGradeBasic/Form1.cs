using System.Diagnostics;

namespace WinAppGradeBasic
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {
            try
            {
                int score = int.Parse(textBox1.Text);
                string grade = "กรุณากรอกคะแนนให้ถูกต้อง (0-100)";
                if (textBox1.Text.Length > 0 && score >= 0 && score <= 100)
                {
                    if (score >= 80)
                    {
                        if (radioButtonA.Checked)
                        {
                            grade = "A";
                        }
                        else
                        {
                            grade = "4";
                        }
                    }
                    else if (score >= 75)
                    {
                        if (radioButtonA.Checked)
                        {
                            grade = "B+";
                        }
                        else
                        {
                            grade = "3.5";
                        }
                    }
                    else if (score >= 70)
                    {
                        if (radioButtonA.Checked)
                        {
                            grade = "B";
                        }
                        else
                        {
                            grade = "3";
                        }
                    }
                    else if (score >= 65)
                    {
                        if (radioButtonA.Checked)
                        {
                            grade = "C+";
                        }
                        else
                        {
                            grade = "2.5";
                        }
                    }
                    else if (score >= 60)
                    {
                        if (radioButtonA.Checked)
                        {
                            grade = "C";
                        }
                        else
                        {
                            grade = "2";
                        }
                    }
                    else if (score >= 55)
                    {
                        if (radioButtonA.Checked)
                        {
                            grade = "D+";
                        }
                        else
                        {
                            grade = "1.5";
                        }
                    }
                    else if (score >= 50)
                    {
                        if (radioButtonA.Checked)
                        {
                            grade = "D";
                        }
                        else
                        {
                            grade = "1";
                        }
                    }
                    else if (score >= 0)
                    {
                        if (radioButtonA.Checked)
                        {
                            grade = "F";
                        }
                        else
                        {
                            grade = "0";
                        }
                    }
                }
                label3.Text = grade;
            }
            catch (Exception Ee)
            {
                label3.Text = "กรอกคะแนนเถอะ";
            }
        }

        private void radioButtonA_CheckedChanged(object sender, EventArgs e)
        {

        }

        private void radioButton1_CheckedChanged(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            label3.Text = "บ่อต้องกด";
        }
    }
}
