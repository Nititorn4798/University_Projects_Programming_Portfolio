namespace WinAppCalculatorBasic
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void textBox2_TextChanged(object sender, EventArgs e)
        {

        }

        private void BtnCalc_Click(object sender, EventArgs e)
        {
            try
            {
                decimal Num1 = Convert.ToDecimal(TxtNum1.Text);
                decimal Num2 = Convert.ToDecimal(TxtNum2.Text);
                if (Num1 > -99999999999 && Num2 > -99999999999)
                {
                    if (radioButtonAdd.Checked)
                    {
                        decimal Result = Num1 + Num2;
                        lnlResult.Text = Convert.ToString(Result);
                    }
                    else if (radioButtonMinus.Checked)
                    {
                        decimal Result = Num1 - Num2;
                        lnlResult.Text = Convert.ToString(Result);
                    }
                    else if (radioButtonMulti.Checked)
                    {
                        decimal Result = Num1 * Num2;
                        lnlResult.Text = Convert.ToString(Result);
                    }
                    else if (radioButtonDivide.Checked)
                    {
                        decimal Result = Num1 / Num2;
                        lnlResult.Text = Convert.ToString(Result);
                    }
                }
            }
            catch (Exception Ee)
            {
                lnlResult.Text = $"พบข้อผิดพลาด {Ee}";
            }

        }

    }
}
