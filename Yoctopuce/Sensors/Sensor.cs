using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Yoctopuce.Sensors
{
    public abstract class Sensor
    {
         // Fields

        protected YSensor sensor;
        protected int hardwaredetect;

        // Properties

        public bool IsOnline
        {
            get => sensor != null && sensor.isOnline();
        }

        public double Value
        {
            get => !IsOnline ? -1 : sensor.get_currentValue();
        }

        public string Unit
        {
            get => !IsOnline ? string.Empty : sensor.get_unit();
        }
        // Constructors

        public Sensor()
        {
            hardwaredetect = 0;
            sensor = GetSensor();
        }

        // Methods

        /// <summary>
        /// Get sensor
        /// </summary>
        /// <returns></returns>
        protected abstract YSensor GetSensor();

        /// <summary>
        /// Get sensor value as string
        /// </summary>
        /// <returns></returns>
        public override string ToString()
        {
            return IsOnline ? $"{Value} {Unit}" : "Sensor is offline";
        }
    }
}
