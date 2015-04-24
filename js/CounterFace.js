/**
 * Created by andy on 15/4/22.
 */
(function($) {

    FlipClock.MenkoCounterFace = FlipClock.Face.extend({

        showSeconds: true,

        /**
         * Constructor
         *
         * @param  object  The parent FlipClock.Factory object
         * @param  object  An object of properties to override the default
         */

        constructor: function(factory, options) {
            this.base(factory, options);
        },

        /**
         * Build the clock face
         */

        build: function(time) {
            var t = this;
            var children = this.factory.$el.find('ul');
            var offset = 0;

            time = time ? time : this.factory.time.getDayCounter(this.showSeconds);

            if(time.length > children.length) {
                $.each(time, function(i, digit) {
                    t.createList(digit);
                });
            }

            if(this.showSeconds) {
                $(this.createDivider('Seconds')).insertBefore(this.lists[this.lists.length - 2].$el);
            }
            else
            {
                offset = 2;
            }

            $(this.createDivider('Minutes')).insertBefore(this.lists[this.lists.length - 4 + offset].$el);
            $(this.createDivider('Hours')).insertBefore(this.lists[this.lists.length - 6 + offset].$el);
            $(this.createDivider('Days', true)).insertBefore(this.lists[0].$el);

            this.base();
        },

        /**
         * Flip the clock face
         */

        flip: function(time, doNotAddPlayClass) {
            if(!time) {
                time = this.factory.time.getDayCounter(this.showSeconds);
            }

            this.autoIncrement();

            this.base(time, doNotAddPlayClass);
        }

    });

}(jQuery));