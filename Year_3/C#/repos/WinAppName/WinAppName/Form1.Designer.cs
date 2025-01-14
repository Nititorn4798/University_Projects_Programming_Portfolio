namespace WinAppName
{
    partial class FormHome
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
            lnlName = new Label();
            lnlLastname = new Label();
            TxtName = new TextBox();
            TxtLastname = new TextBox();
            btnShow = new Button();
            label1 = new Label();
            SuspendLayout();
            // 
            // lnlName
            // 
            lnlName.AutoSize = true;
            lnlName.Font = new Font("TH Sarabun New", 26.25F, FontStyle.Regular, GraphicsUnit.Point, 0);
            lnlName.Location = new Point(83, 59);
            lnlName.Name = "lnlName";
            lnlName.Size = new Size(60, 46);
            lnlName.TabIndex = 0;
            lnlName.Text = "ชื่อ :";
            // 
            // lnlLastname
            // 
            lnlLastname.AutoSize = true;
            lnlLastname.Font = new Font("TH Sarabun New", 26.25F, FontStyle.Regular, GraphicsUnit.Point, 0);
            lnlLastname.Location = new Point(83, 132);
            lnlLastname.Name = "lnlLastname";
            lnlLastname.Size = new Size(114, 46);
            lnlLastname.TabIndex = 1;
            lnlLastname.Text = "นามสกุล :";
            // 
            // TxtName
            // 
            TxtName.Font = new Font("TH Sarabun New", 17.9999981F, FontStyle.Regular, GraphicsUnit.Point, 0);
            TxtName.Location = new Point(220, 59);
            TxtName.Name = "TxtName";
            TxtName.Size = new Size(250, 39);
            TxtName.TabIndex = 2;
            // 
            // TxtLastname
            // 
            TxtLastname.Font = new Font("TH Sarabun New", 17.9999981F, FontStyle.Regular, GraphicsUnit.Point, 0);
            TxtLastname.Location = new Point(220, 132);
            TxtLastname.Name = "TxtLastname";
            TxtLastname.Size = new Size(250, 39);
            TxtLastname.TabIndex = 3;
            // 
            // btnShow
            // 
            btnShow.Font = new Font("TH Sarabun New", 17.9999981F, FontStyle.Regular, GraphicsUnit.Point, 0);
            btnShow.Location = new Point(369, 187);
            btnShow.Name = "btnShow";
            btnShow.Size = new Size(101, 39);
            btnShow.TabIndex = 4;
            btnShow.Text = "แสดงผล";
            btnShow.UseVisualStyleBackColor = true;
            btnShow.Click += btnShow_Click;
            // 
            // label1
            // 
            label1.AutoSize = true;
            label1.Font = new Font("TH Sarabun New", 24F, FontStyle.Regular, GraphicsUnit.Point, 0);
            label1.Location = new Point(220, 247);
            label1.Name = "label1";
            label1.Size = new Size(85, 43);
            label1.TabIndex = 5;
            label1.Text = "______";
            // 
            // FormHome
            // 
            AutoScaleDimensions = new SizeF(7F, 15F);
            AutoScaleMode = AutoScaleMode.Font;
            ClientSize = new Size(800, 450);
            Controls.Add(label1);
            Controls.Add(btnShow);
            Controls.Add(TxtLastname);
            Controls.Add(TxtName);
            Controls.Add(lnlLastname);
            Controls.Add(lnlName);
            Name = "FormHome";
            Text = "MyName Concat";
            Load += FormHome_Load;
            ResumeLayout(false);
            PerformLayout();
        }

        #endregion

        private Label lnlName;
        private Label lnlLastname;
        private TextBox TxtName;
        private TextBox TxtLastname;
        private Button btnShow;
        private Label label1;
    }
}
