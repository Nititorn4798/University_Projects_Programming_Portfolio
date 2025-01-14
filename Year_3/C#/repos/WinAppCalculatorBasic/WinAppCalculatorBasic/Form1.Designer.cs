namespace WinAppCalculatorBasic
{
    partial class Form1
    {
        /// <summary>
        ///  Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        ///  Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        ///  Required method for Designer support - do not modify
        ///  the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            TxtNum1 = new TextBox();
            label1 = new Label();
            BtnCalc = new Button();
            radioButtonAdd = new RadioButton();
            label2 = new Label();
            TxtNum2 = new TextBox();
            radioButtonMinus = new RadioButton();
            lnlResult = new Label();
            radioButtonMulti = new RadioButton();
            radioButtonDivide = new RadioButton();
            label3 = new Label();
            SuspendLayout();
            // 
            // TxtNum1
            // 
            TxtNum1.Location = new Point(302, 61);
            TxtNum1.Name = "TxtNum1";
            TxtNum1.Size = new Size(144, 23);
            TxtNum1.TabIndex = 0;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Location = new Point(223, 64);
            label1.Name = "label1";
            label1.Size = new Size(51, 15);
            label1.TabIndex = 1;
            label1.Text = "ตัวเลขที่ 1";
            // 
            // BtnCalc
            // 
            BtnCalc.Location = new Point(302, 219);
            BtnCalc.Name = "BtnCalc";
            BtnCalc.Size = new Size(144, 33);
            BtnCalc.TabIndex = 2;
            BtnCalc.Text = "คำนวณ";
            BtnCalc.UseVisualStyleBackColor = true;
            BtnCalc.Click += BtnCalc_Click;
            // 
            // radioButtonAdd
            // 
            radioButtonAdd.AutoSize = true;
            radioButtonAdd.Location = new Point(302, 119);
            radioButtonAdd.Name = "radioButtonAdd";
            radioButtonAdd.Size = new Size(44, 19);
            radioButtonAdd.TabIndex = 3;
            radioButtonAdd.TabStop = true;
            radioButtonAdd.Text = "บวก";
            radioButtonAdd.UseVisualStyleBackColor = true;
            // 
            // label2
            // 
            label2.AutoSize = true;
            label2.Location = new Point(223, 93);
            label2.Name = "label2";
            label2.Size = new Size(51, 15);
            label2.TabIndex = 5;
            label2.Text = "ตัวเลขที่ 2";
            // 
            // TxtNum2
            // 
            TxtNum2.Location = new Point(302, 90);
            TxtNum2.Name = "TxtNum2";
            TxtNum2.Size = new Size(144, 23);
            TxtNum2.TabIndex = 4;
            TxtNum2.TextChanged += textBox2_TextChanged;
            // 
            // radioButtonMinus
            // 
            radioButtonMinus.AutoSize = true;
            radioButtonMinus.Location = new Point(302, 144);
            radioButtonMinus.Name = "radioButtonMinus";
            radioButtonMinus.Size = new Size(38, 19);
            radioButtonMinus.TabIndex = 6;
            radioButtonMinus.TabStop = true;
            radioButtonMinus.Text = "ลบ";
            radioButtonMinus.UseVisualStyleBackColor = true;
            // 
            // lnlResult
            // 
            lnlResult.AutoSize = true;
            lnlResult.Location = new Point(302, 269);
            lnlResult.Name = "lnlResult";
            lnlResult.Size = new Size(10, 15);
            lnlResult.TabIndex = 7;
            lnlResult.Text = ":";
            // 
            // radioButtonMulti
            // 
            radioButtonMulti.AutoSize = true;
            radioButtonMulti.Location = new Point(302, 169);
            radioButtonMulti.Name = "radioButtonMulti";
            radioButtonMulti.Size = new Size(43, 19);
            radioButtonMulti.TabIndex = 8;
            radioButtonMulti.TabStop = true;
            radioButtonMulti.Text = "คูณ";
            radioButtonMulti.UseVisualStyleBackColor = true;
            // 
            // radioButtonDivide
            // 
            radioButtonDivide.AutoSize = true;
            radioButtonDivide.Location = new Point(302, 194);
            radioButtonDivide.Name = "radioButtonDivide";
            radioButtonDivide.Size = new Size(42, 19);
            radioButtonDivide.TabIndex = 9;
            radioButtonDivide.TabStop = true;
            radioButtonDivide.Text = "หาร";
            radioButtonDivide.UseVisualStyleBackColor = true;
            // 
            // label3
            // 
            label3.AutoSize = true;
            label3.Location = new Point(223, 269);
            label3.Name = "label3";
            label3.Size = new Size(40, 15);
            label3.TabIndex = 10;
            label3.Text = "ผลลัพธ์";
            // 
            // Form1
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(800, 450);
            Controls.Add(label3);
            Controls.Add(radioButtonDivide);
            Controls.Add(radioButtonMulti);
            Controls.Add(lnlResult);
            Controls.Add(radioButtonMinus);
            Controls.Add(label2);
            Controls.Add(TxtNum2);
            Controls.Add(radioButtonAdd);
            Controls.Add(BtnCalc);
            Controls.Add(label1);
            Controls.Add(TxtNum1);
            Name = "Form1";
            Text = "Form1";
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private TextBox TxtNum1;
        private Label label1;
        private Button BtnCalc;
        private RadioButton radioButtonAdd;
        private Label label2;
        private TextBox TxtNum2;
        private RadioButton radioButtonMinus;
        private Label lnlResult;
        private RadioButton radioButtonMulti;
        private RadioButton radioButtonDivide;
        private Label label3;
    }
}
