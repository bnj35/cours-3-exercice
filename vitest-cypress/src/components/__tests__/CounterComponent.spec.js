import { describe, it, expect, vi } from 'vitest'

import { mount } from '@vue/test-utils'
import { createTestingPinia } from '@pinia/testing'
import Counter from '../CounterComponent.vue'

function mountCounter(x = 0) {
  const wrapper = mount(Counter, {
    global: {
      plugins: [
        createTestingPinia({
          createSpy: vi.fn,
          initialState: {
            counter: { count: x } // start the counter at x instead of 0
          }
        })
      ]
    }
  })
  return wrapper
}

describe('Counter', () => {
  it('renders properly', () => {
    const wrapper = mountCounter(50)
    expect(wrapper.text()).toContain('Counter: 50')
  })
  describe('Clicks', () => {
    it('increments counter', () => {
      const wrapper = mountCounter(50)
      expect(wrapper.find('#counter').text()).toContain('50')
      const incrementButton = wrapper.findAll('button')[1]
      expect(incrementButton.text()).toBe('Increment')
      incrementButton.trigger('click')
      expect(wrapper.find('#counter').text()).toContain('51')
    })

    it('decrements counter', () => {
      const wrapper = mountCounter(50)
      const decrementButton = wrapper.findAll('button')[0]
      expect(decrementButton.text()).toBe('Decrement')
      decrementButton.trigger('click')
      expect(wrapper.find('#counter').text()).toContain('49')
    })
  })
})
