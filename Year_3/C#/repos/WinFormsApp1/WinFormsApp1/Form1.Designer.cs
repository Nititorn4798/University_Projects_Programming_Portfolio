namespace WinFormsApp1
{
    partial class Form1
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
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
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            BtnOK = new Button();
            label1 = new Label();
            TxtMessage = new TextBox();
            TxtMessage2 = new TextBox();
            SuspendLayout();
            // 
            // BtnOK
            // 
            BtnOK.Font = new Font("Comic Sans MS", 15.75F, FontStyle.Regular, GraphicsUnit.Point, 0);
            BtnOK.Location = new Point(277, 148);
            BtnOK.Name = "BtnOK";
            BtnOK.Size = new Size(140, 40);
            BtnOK.TabIndex = 0;
            BtnOK.Text = "Click Me";
            BtnOK.UseVisualStyleBackColor = true;
            BtnOK.Click += BtnOK_Click;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Font = new Font("Comic Sans MS", 18F, FontStyle.Regular, GraphicsUnit.Point, 0);
            label1.Location = new Point(134, 210);
            label1.Name = "label1";
            label1.Size = new Size(60, 33);
            label1.TabIndex = 1;
            label1.Text = "___";
            // 
            // TxtMessage
            // 
            TxtMessage.Font = new Font("Segoe UI", 15.75F, FontStyle.Regular, GraphicsUnit.Point, 0);
            TxtMessage.ForeColor = Color.Black;
            TxtMessage.Location = new Point(134, 26);
            TxtMessage.Name = "TxtMessage";
            TxtMessage.Size = new Size(283, 35);
            TxtMessage.TabIndex = 2;
            // 
            // TxtMessage2
            // 
            TxtMessage2.Font = new Font("Segoe UI", 15.75F, FontStyle.Regular, GraphicsUnit.Point, 0);
            TxtMessage2.ForeColor = Color.Black;
            TxtMessage2.Location = new Point(134, 88);
            TxtMessage2.Name = "TxtMessage2";
            TxtMessage2.Size = new Size(283, 35);
            TxtMessage2.TabIndex = 3;
            // 
            // Form1
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(800, 450);
            Controls.Add(TxtMessage2);
            Controls.Add(TxtMessage);
            Controls.Add(label1);
            Controls.Add(BtnOK);
            Name = "Form1";
            Text = "First Page";
            Load += Form1_Load;
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private Button BtnOK;
        private Label label1;
        private TextBox TxtMessage;
        private TextBox TxtMessage2;
    }
}