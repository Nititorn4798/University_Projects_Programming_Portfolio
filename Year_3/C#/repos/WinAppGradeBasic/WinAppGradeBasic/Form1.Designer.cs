namespace WinAppGradeBasic
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
            label1 = new Label();
            textBox1 = new TextBox();
            label2 = new Label();
            label3 = new Label();
            button1 = new Button();
            radioButtonA = new RadioButton();
            radioButton1 = new RadioButton();
            SuspendLayout();
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Location = new Point(207, 77);
            label1.Name = "label1";
            label1.Size = new Size(63, 15);
            label1.TabIndex = 0;
            label1.Text = "กรอกคะแนน";
            // 
            // textBox1
            // 
            textBox1.Location = new Point(271, 74);
            textBox1.Name = "textBox1";
            textBox1.Size = new Size(100, 23);
            textBox1.TabIndex = 1;
            textBox1.TextChanged += textBox1_TextChanged;
            // 
            // label2
            // 
            label2.AutoSize = true;
            label2.Location = new Point(207, 154);
            label2.Name = "label2";
            label2.Size = new Size(48, 15);
            label2.TabIndex = 2;
            label2.Text = "เกรดที่ได้";
            // 
            // label3
            // 
            label3.AutoSize = true;
            label3.Location = new Point(271, 154);
            label3.Name = "label3";
            label3.Size = new Size(10, 15);
            label3.TabIndex = 3;
            label3.Text = ":";
            // 
            // button1
            // 
            button1.Location = new Point(377, 74);
            button1.Name = "button1";
            button1.Size = new Size(82, 25);
            button1.TabIndex = 4;
            button1.Text = "ไม่ต้องกด";
            button1.UseVisualStyleBackColor = true;
            button1.Click += button1_Click;
            // 
            // radioButtonA
            // 
            radioButtonA.AutoSize = true;
            radioButtonA.Checked = true;
            radioButtonA.Location = new Point(271, 103);
            radioButtonA.Name = "radioButtonA";
            radioButtonA.Size = new Size(82, 19);
            radioButtonA.TabIndex = 5;
            radioButtonA.TabStop = true;
            radioButtonA.Text = "รูปแบบอักษร";
            radioButtonA.UseVisualStyleBackColor = true;
            radioButtonA.CheckedChanged += radioButtonA_CheckedChanged;
            // 
            // radioButton1
            // 
            radioButton1.AutoSize = true;
            radioButton1.Location = new Point(271, 128);
            radioButton1.Name = "radioButton1";
            radioButton1.Size = new Size(85, 19);
            radioButton1.TabIndex = 6;
            radioButton1.Text = "รูปแบบตัวเลข";
            radioButton1.UseVisualStyleBackColor = true;
            radioButton1.CheckedChanged += radioButton1_CheckedChanged;
            // 
            // Form1
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(800, 450);
            Controls.Add(radioButton1);
            Controls.Add(radioButtonA);
            Controls.Add(button1);
            Controls.Add(label3);
            Controls.Add(label2);
            Controls.Add(textBox1);
            Controls.Add(label1);
            Name = "Form1";
            Text = "โปรแกรมตัดเกรด แบบ Easy";
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private Label label1;
        private TextBox textBox1;
        private Label label2;
        private Label label3;
        private Button button1;
        private RadioButton radioButtonA;
        private RadioButton radioButton1;
    }
}
