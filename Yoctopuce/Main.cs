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
        Sensor temperatureSensor;
        Sensor humiditySensor;
        Sensor pressureSensor;
        public Main()
        {
            InitializeComponent();

            // Test
            temperatureSensor = new Temperature();
            humiditySensor = new Humidity();
            pressureSensor = new Pressure();
        }

        private void timer1_Tick(object sender, EventArgs e)
        {
            if (temperatureSensor != null)
                lblTemperature.Text = temperatureSensor.ToString();
            else
                lblTemperature.Text = "OFFLINE";
            
            if (humiditySensor != null)
                lblHumidity.Text = humiditySensor.ToString();
            else
                lblHumidity.Text = "OFFLINE";
            
            if (pressureSensor != null)
                lblPressure.Text = pressureSensor.ToString();
            else
                lblPressure.Text = "OFFLINE";
        }
    }
}
