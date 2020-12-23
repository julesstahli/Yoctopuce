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

using MySql.Data;
using MySql.Data.MySqlClient;

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

            insertMysql();
        }
        private void insertMysql()
        {
            string connStr = "server=localhost;user=yoctopuce;database=apiyoctopuce;port=3306;password=yoctopuce";
            MySqlConnection conn = new MySqlConnection(connStr);
            try
            {
                Console.WriteLine("Connecting to MySQL...");
                conn.Open();

                string sql = $"INSERT INTO measures (temperature, pression, humidity, brightness) VALUES ({Convert.ToInt32(temperatureSensor.Value)}, {pressureSensor.Value}, {humiditySensor.Value}, 20)";
                Console.WriteLine(sql);
                MySqlCommand cmd = new MySqlCommand(sql, conn);
                cmd.ExecuteNonQuery();
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.ToString());
            }

            conn.Close();
            Console.WriteLine("Done.");
        }
    }
}
