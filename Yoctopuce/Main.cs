using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using Yoctopuce.Sensors;

namespace Yoctopuce
{
    public partial class Main : Form
    {
        Temperature temperatureSensor;
        public Main()
        {
            InitializeComponent();

            // Test
            temperatureSensor = new Temperature();
            Console.WriteLine(temperatureSensor.ToString());
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            if (temperatureSensor != null)
                lblTemperature.Text = temperatureSensor.ToString();
            else
                lblTemperature.Text = "OFFLINE";
        }
    }
}
